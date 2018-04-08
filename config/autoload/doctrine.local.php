<?php

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params'      => array(
                    'host'          => 'localhost',
                    'port'          => '3306',
                    'user'          => 'aevintyri_01',
                    'password'      => 'x$G7g5!T',
                    'dbname'        => 'aevintyri_01',
                    'driverOptions' => array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                    )
                )
            )
        )
    )
);
