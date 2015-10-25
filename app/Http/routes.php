<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->get('/', function () use ($app) {
    return "Ævintýri RESTful API by Joschi Kuphal / tollwerk GmbH (https://jkphl.is)";
});

$app->group(['prefix' => 'api/v1', 'namespace' => 'App\Http\Controllers'], function ($app) {

    // Event
    $app->get('event', 'EventController@listEvents');
    $app->get('event/{id}', 'EventController@getEvent');
    $app->post('event', 'EventController@createEvent');
    $app->put('event/{id}', 'EventController@updateEvent');
    $app->delete('event/{id}', 'EventController@deleteEvent');

    // country
    // day
    // event
    // link
    // organizer
    // presenter
    // presenter_tag
    // question
    // room
    // session
    // session_presenter
    // session_tag
    // tag
    // user
    // usergroup
    // venue
});