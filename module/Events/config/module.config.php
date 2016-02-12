<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Events;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Events\Controller',
						'controller'    => 'Events\Controller\Event',
                        'action'        => 'calendar',
                    ),
                ),
            ),
			// The following is a route to simplify getting started creating
			// new controllers and actions without needing to create a new
			// module. Simply drop new controllers in, and you can access them
			// using the path /application/:controller/:action
        	
        	'tag' => array(
        		'type'    => 'Segment',
        		'options' => array(
        			'route'    => '/tag[/:action[/:id]]',
        			'constraints' => array(
        				'controller'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'action'		=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'id'     		=> '[0-9]*',
        			),
        			'defaults' => array(
        				'__NAMESPACE__' => 'Events\Controller',
        				'controller'    => 'Events\Controller\Tag',
        				'action'        => 'list',
        			),
        		)
        	),
        	 
        	'organizer' => array(
        		'type'    => 'Segment',
        		'options' => array(
        			'route'    => '/organizer[/:action[/:id]]',
        			'constraints' => array(
        				'controller' 	=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'action'		=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'id'     		=> '[0-9]*',
        			),
        			'defaults' => array(
        				'__NAMESPACE__' => 'Events\Controller',
        				'controller'    => 'Events\Controller\Organizer',
        				'action'        => 'list',
        			),
        		)
        	),
        	 
        	'venue' => array(
        		'type'    => 'Segment',
        		'options' => array(
        			'route'    => '/venue[/:action[/:id]]',
        			'constraints' => array(
        				'controller'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'action'		=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'id'     		=> '[0-9]*',
        			),
        			'defaults' => array(
        				'__NAMESPACE__' => 'Events\Controller',
        				'controller'    => 'Events\Controller\Venue',
        				'action'        => 'list',
        			),
        		),
        	),
        	
        	'presenter' => array(
        		'type' => 'Segment',
        		'options' => array(
        			'route'    => '/presenter[/:action[/:id]]',
        			'constraints' => array(
        				'controller'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'action'		=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'id'     		=> '[0-9]*',
        			),
        			'defaults' => array(
        				'__NAMESPACE__' => 'Events\Controller',
        				'controller' => 'Events\Controller\Presenter',
        				'action' => 'list'
        			)
        		),
        	),
        	
        	'link' => array(
        		'type' => 'Segment',
        		'options' => array(
        			'route'    => '/link[/:action[/:id][/presenter/:presenter][/session/:session]]',
        			'constraints' => array(
        				'controller'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'action'		=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'id'     		=> '[0-9]*',
        				'presenter' 	=> '[0-9]*',
        				'session'  		=> '[0-9]*',
        			),
        			'defaults' => array(
        				'__NAMESPACE__' => 'Events\Controller',
        				'controller' => 'Events\Controller\Link',
        			)
        		),
        	),
        	
        	'room' => array(
        		'type' => 'Segment',
        		'options' => array(
        			'route'    => '/room[/:action[/:id][/venue/:venue]]',
        			'constraints' => array(
        				'controller'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'action'		=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'id'     		=> '[0-9]*',
        				'venue'		 	=> '[0-9]*',
        			),
        			'defaults' => array(
        				'__NAMESPACE__' => 'Events\Controller',
        				'controller' => 'Events\Controller\Room',
        			)
        		),
        	),
        	
        	'session' => array(
        		'type' => 'Segment',
        		'options' => array(
        			'route'    => '/session[/:action[/:id][/day/:day]]',
        			'constraints' => array(
        				'controller'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'action'		=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'id'     		=> '[0-9]*',
        				'day'		 	=> '[0-9]*',
        			),
        			'defaults' => array(
        				'__NAMESPACE__' => 'Events\Controller',
        				'controller' => 'Events\Controller\Session',
        			)
        		),
        	),
        	
        	'day' => array(
        		'type' => 'Segment',
        		'options' => array(
        			'route'    => '/day[/:action[/:id][/event/:event]]',
        			'constraints' => array(
        				'controller'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'action'		=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'id'     		=> '[0-9]*',
        				'event'		 	=> '[0-9]*',
        			),
        			'defaults' => array(
        				'__NAMESPACE__' => 'Events\Controller',
        				'controller'	=> 'Events\Controller\Day',
        			)
        		),
        	),
        	
        	'event' => array(
        		'type' => 'Segment',
        		'options' => array(
        			'route'    => '/event[/:action[/:type[/:id]][/series/:series]]',
        			'constraints'		=> array(
        				'controller'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'action'		=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'type'			=> '[a-zA-Z][a-zA-Z0-9_-]*',
        				'id'	     	=> '[0-9]*',
        				'series'		=> '[0-9]*',
        			),
        			'defaults' => array(
        				'__NAMESPACE__'	=> 'Events\Controller',
        				'controller'	=> 'Events\Controller\Event',
        				'action'		=> 'calendar',
        			)
        		),
        	),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Events\Controller\Event'		=> 'Events\Controller\EventController',
            'Events\Controller\Organizer'	=> 'Events\Controller\OrganizerController',
            'Events\Controller\Venue'		=> 'Events\Controller\VenueController',
            'Events\Controller\Tag'			=> 'Events\Controller\TagController',
            'Events\Controller\Presenter'	=> 'Events\Controller\PresenterController',
            'Events\Controller\Link'		=> 'Events\Controller\LinkController',
            'Events\Controller\Room'		=> 'Events\Controller\RoomController',
            'Events\Controller\Day'			=> 'Events\Controller\DayController',
            'Events\Controller\Session'		=> 'Events\Controller\SessionController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' 			=> true,
        'display_exceptions'      			=> true,
        'doctype'                  			=> 'HTML5',
        'not_found_template'       			=> 'error/404',
        'exception_template'       			=> 'error/index',
        'template_map' => array(
            'layout/layout'           		=> __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' 		=> __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               		=> __DIR__ . '/../view/error/404.phtml',
            'error/index'             		=> __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
	'doctrine' => array (
		'driver' => array (
			__NAMESPACE__ . '_driver' => array (
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => array (
					__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity' 
				) 
			),
			'orm_default' => array (
				'drivers' => array (
					__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver' 
				) 
			) 
		) 
	),
);
