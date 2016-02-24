<?php

/**
 * aevintyri
 *
 * @category    Jkphl
 * @package     Jkphl_aevintyri
 * @author      Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @copyright   Copyright © 2016 Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @license     http://opensource.org/licenses/MIT	The MIT License (MIT)
 */

/***********************************************************************************
 *  The MIT License (MIT)
 *
 *  Copyright © 2015 Joschi Kuphal <joschi@kuphal.net> / @jkphl
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy of
 *  this software and associated documentation files (the "Software"), to deal in
 *  the Software without restriction, including without limitation the rights to
 *  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 *  the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 *  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 ***********************************************************************************/

chdir(__DIR__);
$quiet = in_array('quiet', $argv);

// Require the autoloader
require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

// Load the environment variables
Dotenv::load(dirname(__DIR__));

// Instantiate the database connections
$sourceDB = mysqli_connect(getenv('DB_HOST'), getenv('DB_COMPAT_USERNAME'), getenv('DB_COMPAT_PASSWORD'), getenv('DB_COMPAT_DATABASE'), getenv('DB_PORT'));
$targetDB = mysqli_connect(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_DATABASE'), getenv('DB_PORT'));

// Mandatory mapping config keys
$mandatoryKeys = ['source' => true, 'target' => true, 'columns' => true];

// Run through all table mapping definitions
foreach (glob('*.map.php') as $mapping) {
    $mappingConfig = include __DIR__.DIRECTORY_SEPARATOR.$mapping;
    $keys = array_filter(array_intersect_key($mappingConfig, $mandatoryKeys));
    if ((count($keys) == count($mandatoryKeys)) && is_array($mappingConfig['columns']) && count($mappingConfig['columns'])) {

        // Set all records to deleted
        $targetDelete = 'UPDATE `'.getenv('DB_DATABASE').'`.`'.$mappingConfig['target'].'` SET `deleted_at` = NOW()';
        mysqli_query($targetDB, $targetDelete);

        // Build a SELECT statement for the source table
        $sourceSelect = 'SELECT ';
        $selectColumns = [];
        foreach ($mappingConfig['columns'] as $columnTarget => $columnSource) {
            $selectColumns[] = $columnSource.' AS `'.$columnTarget.'`';
        }
        $sourceSelect .= implode(', ', $selectColumns);
        $sourceSelect .= ' FROM `'.getenv('DB_COMPAT_DATABASE').'`.`'.$mappingConfig['source'].'`';
        if (!empty($mappingConfig['where'])) {
            $sourceSelect .= ' WHERE '.$mappingConfig['where'];
        }

        $replaceQuery = 'REPLACE INTO `'.getenv('DB_DATABASE').'`.`'.$mappingConfig['target'].'`';
        $replaceQuery .= ' (`'.implode('`, `', array_keys($mappingConfig['columns'])).'`) '.$sourceSelect;

        if (!$quiet) {
            echo 'Migrating table `' . $mappingConfig['target'] . '` ... ';
        }
        $success = mysqli_query($targetDB, $replaceQuery);
        if (!$success) {
            if (!$quiet) {
                echo 'ERROR!\n\t' . mysqli_error($targetDB);
            }
        } else {
            if (!$quiet) {
                echo 'SUCCESS!' . PHP_EOL;
            }
        }
    }
}