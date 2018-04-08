<?php
/**
 * Global ACL
 *
 */
return array(
    'acl' => array(
        'roles'     => array(
            'guest' => null,
            'user'  => 'guest',
            'admin' => 'user'
        ),
        'resources' => array(
            'allow' => array(
                'Events\Controller\Event'      => array(
                    'calendar' => 'guest',
                    'all'      => 'user'
                ),
                'Events\Controller\Tag'        => array(
                    'all' => 'user'
                ),
                'Events\Controller\Organizer'  => array(
                    'all' => 'user'
                ),
                'Events\Controller\Venue'      => array(
                    'all' => 'user'
                ),
                'Events\Controller\Presenter'  => array(
                    'all' => 'user'
                ),
                'Events\Controller\Link'       => array(
                    'all' => 'user'
                ),
                'Events\Controller\Room'       => array(
                    'all' => 'user'
                ),
                'Events\Controller\Day'        => array(
                    'all' => 'user'
                ),
                'Events\Controller\Session'    => array(
                    'all' => 'user'
                ),
                'Auth\Controller\Index'        => array(
                    'login'  => 'guest',
                    'logout' => 'user'
                ),
                'Auth\Controller\Registration' => array(
                    'reset-password' => 'guest',
                )
            ),
            'deny'  => array(
                'Auth\Controller\Index'        => array(
                    'login' => 'user'
                ),
                'Auth\Controller\Registration' => array(
                    'reset-password' => 'user',
                )
            )
        )
    )
);