'use strict';

const Validator = require('jsonapi-validator').Validator;
const async = require('async');
const chalk = require('chalk');
const util = require('util');

var validator = new Validator();
var http = require('http');
var httpOptions = {
    host: 'aevintyri.tollwerk.de',
    path: '/api/v2',
    headers: {'Accept': 'application/json'}
};

/**
 * Create a validation task for a specific URI
 *
 * @param {string} uri          Absolute endpoint URI
 * @returns {Function}          Task
 */
function validateEndpointTask(uri) {
    return function(id, cb) {

        // If it's the first call, take the first argument as callback
        if (arguments.length < 2) {
            cb = id;
            id = null;
        } else {
            uri = util.format(uri, id);
        }

        process.stdout.write('Validating ' + chalk.bgBlue(' ' + uri + ' ') + '\r');

        // Request the endpoint data
        var apiReq = http.get(uri, function(apiRes) {
            var apiJSON = '';
            apiRes.setEncoding('utf8');
            apiRes.on('data', function (apiData) {
                apiJSON += apiData;
            });
            apiRes.on('end', function () {
                try {
                    apiJSON = JSON.parse(apiJSON);
                    if (validator.isValid(apiJSON)) {
                        console.log('Validating ' + chalk.black.bgGreen(' ' + uri + ' '));

                        // If this was the first call: Get the first data ID
                        if ((id === null) && (typeof apiJSON.data == 'object') && apiJSON.data.length) {
                            return cb(null, apiJSON.data[0].id);
                        }

                        return cb(null, id);
                    } else {
                        console.log('Validating ' + chalk.bgRed(' ' + uri + ' '));
                        return cb('Error');
                    }
                } catch (e) {
                    console.log('Validating ' + chalk.bgRed(' ' + uri + ' '));
                    console.log(chalk.red(e));
                    return cb(e);
                }
            });
        });
        apiReq.on('error', function(e) {
            console.log('Validating ' + chalk.bgRed(' ' + uri + ' '));
            console.log(e);
            cb(e);
        });
        apiReq.end();
    }
}

/**
 * Create a test task for a specific endpoint
 *
 * @param {String} uri          Relative endpoint URI
 * @returns {Function}          Task
 */
function endpointTask(uri) {
    return function(cb) {
        var baseuri = 'http://' + httpOptions.host + uri;
        async.waterfall([
            validateEndpointTask(baseuri),
            validateEndpointTask(baseuri + '?include=*'),
            validateEndpointTask(baseuri + '?include=**'),
            validateEndpointTask(baseuri + '?extend=*'),
            validateEndpointTask(baseuri + '?include=*&extend=*'),
            validateEndpointTask(baseuri + '?include=**&extend=*'),
            validateEndpointTask(baseuri + '/%s'),
            validateEndpointTask(baseuri + '/%s?include=*'),
            validateEndpointTask(baseuri + '/%s?include=**'),
            validateEndpointTask(baseuri + '/%s?extend=*'),
            validateEndpointTask(baseuri + '/%s?include=*&extend=*'),
            validateEndpointTask(baseuri + '/%s?include=**&extend=*')
        ], function() {
            cb();
        });
    }
}


var endpointsJSON = http.request(httpOptions, function(res){
    res.setEncoding('utf8');
    res.on('data', function (data) {
        var endpoints = JSON.parse(data);
        var tasks = [];
        for (var endpoint in endpoints) {
            if (endpoints.hasOwnProperty(endpoint)) {
                tasks.push(endpointTask(endpoints[endpoint]));
            }
        }
        async.waterfall(tasks, function (err, result) {

        });
    });
});
endpointsJSON.on('error', function(e) {
    console.log('problem with request: ' + e.message);
});
endpointsJSON.end();