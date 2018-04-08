<?php
/**
 * Global Navigation
 *
 */
return array(
    'navigation' => array(
        'default'   => array(
            array(
                'label'           => _('events.section.label.tag.list'),
                'route'           => 'tag',
                'use_route_match' => true,
                'resource'        => 'Events\Controller\Tag',
                'action'          => 'list',
                'privilege'       => 'tag',
                'class'           => 'icons-tag',
            ),
            array(
                'label'           => _('events.section.label.organizer.list'),
                'route'           => 'organizer',
                'use_route_match' => true,
                'resource'        => 'Events\Controller\Organizer',
                'action'          => 'list',
                'privilege'       => 'organizer',
                'class'           => 'icons-organizer',
            ),
            array(
                'label'           => _('events.section.label.venue.list'),
                'route'           => 'venue',
                'use_route_match' => true,
                'resource'        => 'Events\Controller\Venue',
                'action'          => 'list',
                'privilege'       => 'venue',
                'class'           => 'icons-venue',
            ),
            array(
                'label'           => _('events.section.label.presenter.list'),
                'route'           => 'presenter',
                'use_route_match' => true,
                'resource'        => 'Events\Controller\Presenter',
                'action'          => 'list',
                'privilege'       => 'presenter',
                'class'           => 'icons-presenter',
            ),
            array(
                'label'           => _('events.section.label.event.list.series'),
                'route'           => 'event',
                'use_route_match' => true,
                'resource'        => 'Events\Controller\Event',
                'action'          => 'list',
                'params'          => array('type' => 'series'),
                'privilege'       => 'event-series',
                'class'           => 'icons-event-series',
            ),
            array(
                'label'           => _('events.section.label.event.list.single'),
                'route'           => 'event',
                'use_route_match' => true,
                'resource'        => 'Events\Controller\Event',
                'action'          => 'list',
                'params'          => array('type' => 'single'),
                'privilege'       => 'event-single',
                'class'           => 'icons-event-single',
            )
        ),
        'secondary' => array(
            array(
                'label'           => _('auth.section.label.signin'),
                'route'           => 'user-index',
                'controller'      => 'index',
                'action'          => 'login',
                'use_route_match' => true,
                'resource'        => 'Auth\Controller\Index',
                'privilege'       => 'login'
            ),
            array(
                'label'           => _('auth.section.label.reset'),
                'route'           => 'user-register',
                'controller'      => 'registration',
                'action'          => 'reset-password',
                'use_route_match' => true,
                'resource'        => 'Auth\Controller\Registration',
                'privilege'       => 'reset-password'
            ),
            array(
                'label'           => _('auth.section.label.logout'),
                'route'           => 'user-index',
                'controller'      => 'index',
                'action'          => 'logout',
                'use_route_match' => true,
                'resource'        => 'Auth\Controller\Index',
                'privilege'       => 'logout',
                'class'           => 'icons-logout'
            )
        )
    ),

    'service_manager' => array(
        'factories' => array(
            'navleft'  => 'Zend\Navigation\Service\DefaultNavigationFactory',
            'navright' => 'Events\Navigation\Service\SecondaryNavigationFactory'
        )
    )
);