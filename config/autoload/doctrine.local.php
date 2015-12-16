<?php

return array (
	'doctrine' => array (
		'connection' => array (
			'orm_default' => array (
				'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
				'params' => array (
					'host' => 'localhost',
					'port' => '3306',
					'user' => 'events_01',
					'password' => 'a,6k*EK4',
					'dbname' => 'events_01',
					'driverOptions' => array (
						PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
					) 
				) 
			) 
		) 
	)
);