<?php
return array(
    'router'                 => array(
        'routes' => array(
            'api.rest.events'     => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/events[/:event_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Events\\Controller',
                    ),
                ),
            ),
            'api.rest.organizers' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/organizers[/:organizers_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Organizers\\Controller',
                    ),
                ),
            ),
            'api.rest.countries'  => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/countries[/:countries_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Countries\\Controller',
                    ),
                ),
            ),
            'api.rest.tags'       => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/tags[/:tags_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Tags\\Controller',
                    ),
                ),
            ),
            'api.rest.venues'     => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/venues[/:venues_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Venues\\Controller',
                    ),
                ),
            ),
            'api.rest.days'       => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/days[/:days_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Days\\Controller',
                    ),
                ),
            ),
            'api.rest.links'      => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/links[/:links_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Links\\Controller',
                    ),
                ),
            ),
            'api.rest.presenters' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/presenters[/:presenters_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Presenters\\Controller',
                    ),
                ),
            ),
            'api.rest.rooms'      => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/rooms[/:rooms_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Rooms\\Controller',
                    ),
                ),
            ),
            'api.rest.sessions'   => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/sessions[/:sessions_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Sessions\\Controller',
                    ),
                ),
            ),
            'api.rest.series'     => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/series[/:series_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Series\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning'          => array(
        'uri' => array(
            0  => 'api.rest.events',
            2  => 'api.rest.organizers',
            3  => 'api.rest.countries',
            1  => 'api.rest.tags',
            4  => 'api.rest.venues',
            5  => 'api.rest.days',
            6  => 'api.rest.links',
            7  => 'api.rest.presenters',
            8  => 'api.rest.rooms',
            9  => 'api.rest.sessions',
            10 => 'api.rest.series',
        ),
    ),
    'service_manager'        => array(
        'factories' => array(
            'API\\V1\\Rest\\Events\\EventsResource'         => 'API\\V1\\Rest\\Events\\EventsResourceFactory',
            'v1.mapper.events'                              => 'API\\V1\\Mapper\\Factory\\EventFactory',
            'API\\V1\\Rest\\Tags\\TagsResource'             => 'API\\V1\\Rest\\Tags\\TagsResourceFactory',
            'v1.mapper.tags'                                => 'API\\V1\\Mapper\\Factory\\TagFactory',
            'API\\V1\\Rest\\Organizers\\OrganizersResource' => 'API\\V1\\Rest\\Organizers\\OrganizersResourceFactory',
            'v1.mapper.organizers'                          => 'API\\V1\\Mapper\\Factory\\OrganizerFactory',
            'API\\V1\\Rest\\Countries\\CountriesResource'   => 'API\\V1\\Rest\\Countries\\CountriesResourceFactory',
            'v1.mapper.countries'                           => 'API\\V1\\Mapper\\Factory\\CountryFactory',
            'API\\V1\\Rest\\Venues\\VenuesResource'         => 'API\\V1\\Rest\\Venues\\VenuesResourceFactory',
            'v1.mapper.venues'                              => 'API\\V1\\Mapper\\Factory\\VenueFactory',
            'API\\V1\\Rest\\Days\\DaysResource'             => 'API\\V1\\Rest\\Days\\DaysResourceFactory',
            'v1.mapper.days'                                => 'API\\V1\\Mapper\\Factory\\DayFactory',
            'API\\V1\\Rest\\Links\\LinksResource'           => 'API\\V1\\Rest\\Links\\LinksResourceFactory',
            'v1.mapper.links'                               => 'API\\V1\\Mapper\\Factory\\LinkFactory',
            'API\\V1\\Rest\\Presenters\\PresentersResource' => 'API\\V1\\Rest\\Presenters\\PresentersResourceFactory',
            'v1.mapper.presenters'                          => 'API\\V1\\Mapper\\Factory\\PresenterFactory',
            'API\\V1\\Rest\\Rooms\\RoomsResource'           => 'API\\V1\\Rest\\Rooms\\RoomsResourceFactory',
            'v1.mapper.rooms'                               => 'API\\V1\\Mapper\\Factory\\RoomFactory',
            'API\\V1\\Rest\\Sessions\\SessionsResource'     => 'API\\V1\\Rest\\Sessions\\SessionsResourceFactory',
            'v1.mapper.sessions'                            => 'API\\V1\\Mapper\\Factory\\SessionFactory',
            'API\\V1\\Rest\\Series\\SeriesResource'         => 'API\\V1\\Rest\\Series\\SeriesResourceFactory',
            'v1.mapper.series'                              => 'API\\V1\\Mapper\\Factory\\SeriesFactory',
        ),
    ),
    'zf-rest'                => array(
        'API\\V1\\Rest\\Events\\Controller'     => array(
            'listener'                   => 'API\\V1\\Rest\\Events\\EventsResource',
            'route_name'                 => 'api.rest.events',
            'route_identifier_name'      => 'event_id',
            'collection_name'            => 'events',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'start',
                1 => 'end',
                2 => 'flat',
                3 => 'max',
            ),
            'page_size'                  => '10',
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Events\\EventsEntity',
            'collection_class'           => 'API\\V1\\Rest\\Events\\EventsCollection',
            'service_name'               => 'events',
        ),
        'API\\V1\\Rest\\Series\\Controller'     => array(
            'listener'                   => 'API\\V1\\Rest\\Series\\SeriesResource',
            'route_name'                 => 'api.rest.series',
            'route_identifier_name'      => 'series_id',
            'collection_name'            => 'series',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'max',
                1 => 'flat',
            ),
            'page_size'                  => 25,
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Series\\SeriesEntity',
            'collection_class'           => 'API\\V1\\Rest\\Series\\SeriesCollection',
            'service_name'               => 'series',
        ),
        'API\\V1\\Rest\\Organizers\\Controller' => array(
            'listener'                   => 'API\\V1\\Rest\\Organizers\\OrganizersResource',
            'route_name'                 => 'api.rest.organizers',
            'route_identifier_name'      => 'organizers_id',
            'collection_name'            => 'organizers',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'max',
                1 => 'flat',
            ),
            'page_size'                  => 25,
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Organizers\\OrganizersEntity',
            'collection_class'           => 'API\\V1\\Rest\\Organizers\\OrganizersCollection',
            'service_name'               => 'organizers',
        ),
        'API\\V1\\Rest\\Days\\Controller'       => array(
            'listener'                   => 'API\\V1\\Rest\\Days\\DaysResource',
            'route_name'                 => 'api.rest.days',
            'route_identifier_name'      => 'days_id',
            'collection_name'            => 'days',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'max',
                1 => 'flat',
            ),
            'page_size'                  => 25,
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Days\\DaysEntity',
            'collection_class'           => 'API\\V1\\Rest\\Days\\DaysCollection',
            'service_name'               => 'days',
        ),
        'API\\V1\\Rest\\Sessions\\Controller'   => array(
            'listener'                   => 'API\\V1\\Rest\\Sessions\\SessionsResource',
            'route_name'                 => 'api.rest.sessions',
            'route_identifier_name'      => 'sessions_id',
            'collection_name'            => 'sessions',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'max',
                1 => 'flat',
            ),
            'page_size'                  => 25,
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Sessions\\SessionsEntity',
            'collection_class'           => 'API\\V1\\Rest\\Sessions\\SessionsCollection',
            'service_name'               => 'sessions',
        ),
        'API\\V1\\Rest\\Presenters\\Controller' => array(
            'listener'                   => 'API\\V1\\Rest\\Presenters\\PresentersResource',
            'route_name'                 => 'api.rest.presenters',
            'route_identifier_name'      => 'presenters_id',
            'collection_name'            => 'presenters',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'max',
                1 => 'flat',
            ),
            'page_size'                  => 25,
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Presenters\\PresentersEntity',
            'collection_class'           => 'API\\V1\\Rest\\Presenters\\PresentersCollection',
            'service_name'               => 'presenters',
        ),
        'API\\V1\\Rest\\Rooms\\Controller'      => array(
            'listener'                   => 'API\\V1\\Rest\\Rooms\\RoomsResource',
            'route_name'                 => 'api.rest.rooms',
            'route_identifier_name'      => 'rooms_id',
            'collection_name'            => 'rooms',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'max',
                1 => 'flat',
            ),
            'page_size'                  => 25,
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Rooms\\RoomsEntity',
            'collection_class'           => 'API\\V1\\Rest\\Rooms\\RoomsCollection',
            'service_name'               => 'rooms',
        ),
        'API\\V1\\Rest\\Venues\\Controller'     => array(
            'listener'                   => 'API\\V1\\Rest\\Venues\\VenuesResource',
            'route_name'                 => 'api.rest.venues',
            'route_identifier_name'      => 'venues_id',
            'collection_name'            => 'venues',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'max',
                1 => 'flat',
            ),
            'page_size'                  => 25,
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Venues\\VenuesEntity',
            'collection_class'           => 'API\\V1\\Rest\\Venues\\VenuesCollection',
            'service_name'               => 'venues',
        ),
        'API\\V1\\Rest\\Countries\\Controller'  => array(
            'listener'                   => 'API\\V1\\Rest\\Countries\\CountriesResource',
            'route_name'                 => 'api.rest.countries',
            'route_identifier_name'      => 'countries_id',
            'collection_name'            => 'countries',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'max',
            ),
            'page_size'                  => 25,
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Countries\\CountriesEntity',
            'collection_class'           => 'API\\V1\\Rest\\Countries\\CountriesCollection',
            'service_name'               => 'countries',
        ),
        'API\\V1\\Rest\\Links\\Controller'      => array(
            'listener'                   => 'API\\V1\\Rest\\Links\\LinksResource',
            'route_name'                 => 'api.rest.links',
            'route_identifier_name'      => 'links_id',
            'collection_name'            => 'links',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'max',
            ),
            'page_size'                  => 25,
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Links\\LinksEntity',
            'collection_class'           => 'API\\V1\\Rest\\Links\\LinksCollection',
            'service_name'               => 'links',
        ),
        'API\\V1\\Rest\\Tags\\Controller'       => array(
            'listener'                   => 'API\\V1\\Rest\\Tags\\TagsResource',
            'route_name'                 => 'api.rest.tags',
            'route_identifier_name'      => 'tags_id',
            'collection_name'            => 'tags',
            'entity_http_methods'        => array(
                0 => 'GET',
            ),
            'collection_http_methods'    => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'max',
            ),
            'page_size'                  => 25,
            'page_size_param'            => 'max',
            'entity_class'               => 'API\\V1\\Rest\\Tags\\TagsEntity',
            'collection_class'           => 'API\\V1\\Rest\\Tags\\TagsCollection',
            'service_name'               => 'tags',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers'            => array(
            'API\\V1\\Rest\\Events\\Controller'     => 'HalJson',
            'API\\V1\\Rest\\Tags\\Controller'       => 'HalJson',
            'API\\V1\\Rest\\Organizers\\Controller' => 'HalJson',
            'API\\V1\\Rest\\Countries\\Controller'  => 'HalJson',
            'API\\V1\\Rest\\Venues\\Controller'     => 'HalJson',
            'API\\V1\\Rest\\Days\\Controller'       => 'HalJson',
            'API\\V1\\Rest\\Links\\Controller'      => 'HalJson',
            'API\\V1\\Rest\\Presenters\\Controller' => 'HalJson',
            'API\\V1\\Rest\\Rooms\\Controller'      => 'HalJson',
            'API\\V1\\Rest\\Sessions\\Controller'   => 'HalJson',
            'API\\V1\\Rest\\Series\\Controller'     => 'HalJson',
        ),
        'accept_whitelist'       => array(
            'API\\V1\\Rest\\Events\\Controller'     => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'API\\V1\\Rest\\Tags\\Controller'       => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'API\\V1\\Rest\\Organizers\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'API\\V1\\Rest\\Countries\\Controller'  => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'API\\V1\\Rest\\Venues\\Controller'     => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'API\\V1\\Rest\\Days\\Controller'       => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'API\\V1\\Rest\\Links\\Controller'      => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'API\\V1\\Rest\\Presenters\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'API\\V1\\Rest\\Rooms\\Controller'      => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'API\\V1\\Rest\\Sessions\\Controller'   => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'API\\V1\\Rest\\Series\\Controller'     => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'API\\V1\\Rest\\Events\\Controller'     => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'API\\V1\\Rest\\Tags\\Controller'       => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'API\\V1\\Rest\\Organizers\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'API\\V1\\Rest\\Countries\\Controller'  => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'API\\V1\\Rest\\Venues\\Controller'     => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'API\\V1\\Rest\\Days\\Controller'       => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'API\\V1\\Rest\\Links\\Controller'      => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'API\\V1\\Rest\\Presenters\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'API\\V1\\Rest\\Rooms\\Controller'      => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'API\\V1\\Rest\\Sessions\\Controller'   => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'API\\V1\\Rest\\Series\\Controller'     => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal'                 => array(
        'metadata_map' => array(
            'API\\V1\\Rest\\Events\\EventsEntity'             => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.events',
                'route_identifier_name'  => 'event_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ObjectProperty',
            ),
            'API\\V1\\Rest\\Events\\EventsCollection'         => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.events',
                'route_identifier_name'  => 'event_id',
                'is_collection'          => true,
            ),
            'API\\V1\\Rest\\Tags\\TagsEntity'                 => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.tags',
                'route_identifier_name'  => 'tags_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ObjectProperty',
            ),
            'API\\V1\\Rest\\Tags\\TagsCollection'             => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.tags',
                'route_identifier_name'  => 'tags_id',
                'is_collection'          => true,
            ),
            'API\\V1\\Rest\\Organizers\\OrganizersEntity'     => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.organizers',
                'route_identifier_name'  => 'organizers_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'API\\V1\\Rest\\Organizers\\OrganizersCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.organizers',
                'route_identifier_name'  => 'organizers_id',
                'is_collection'          => true,
            ),
            'API\\V1\\Rest\\Countries\\CountriesEntity'       => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.countries',
                'route_identifier_name'  => 'countries_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'API\\V1\\Rest\\Countries\\CountriesCollection'   => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.countries',
                'route_identifier_name'  => 'countries_id',
                'is_collection'          => true,
            ),
            'API\\V1\\Rest\\Venues\\VenuesEntity'             => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.venues',
                'route_identifier_name'  => 'venues_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'API\\V1\\Rest\\Venues\\VenuesCollection'         => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.venues',
                'route_identifier_name'  => 'venues_id',
                'is_collection'          => true,
            ),
            'API\\V1\\Rest\\Days\\DaysEntity'                 => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.days',
                'route_identifier_name'  => 'days_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'API\\V1\\Rest\\Days\\DaysCollection'             => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.days',
                'route_identifier_name'  => 'days_id',
                'is_collection'          => true,
            ),
            'API\\V1\\Rest\\Links\\LinksEntity'               => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.links',
                'route_identifier_name'  => 'links_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'API\\V1\\Rest\\Links\\LinksCollection'           => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.links',
                'route_identifier_name'  => 'links_id',
                'is_collection'          => true,
            ),
            'API\\V1\\Rest\\Presenters\\PresentersEntity'     => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.presenters',
                'route_identifier_name'  => 'presenters_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'API\\V1\\Rest\\Presenters\\PresentersCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.presenters',
                'route_identifier_name'  => 'presenters_id',
                'is_collection'          => true,
            ),
            'API\\V1\\Rest\\Rooms\\RoomsEntity'               => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.rooms',
                'route_identifier_name'  => 'rooms_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'API\\V1\\Rest\\Rooms\\RoomsCollection'           => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.rooms',
                'route_identifier_name'  => 'rooms_id',
                'is_collection'          => true,
            ),
            'API\\V1\\Rest\\Sessions\\SessionsEntity'         => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.sessions',
                'route_identifier_name'  => 'sessions_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'API\\V1\\Rest\\Sessions\\SessionsCollection'     => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.sessions',
                'route_identifier_name'  => 'sessions_id',
                'is_collection'          => true,
            ),
            'API\\V1\\Rest\\Series\\SeriesEntity'             => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.series',
                'route_identifier_name'  => 'series_id',
                'hydrator'               => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'API\\V1\\Rest\\Series\\SeriesCollection'         => array(
                'entity_identifier_name' => 'id',
                'route_name'             => 'api.rest.series',
                'route_identifier_name'  => 'series_id',
                'is_collection'          => true,
            ),
        ),
    ),
    'zf-content-validation'  => array(
        'API\\V1\\Rest\\Events\\Controller'     => array(
            'input_filter' => 'API\\V1\\Rest\\Events\\Validator',
        ),
        'API\\V1\\Rest\\Days\\Controller'       => array(
            'input_filter' => 'API\\V1\\Rest\\Days\\Validator',
        ),
        'API\\V1\\Rest\\Organizers\\Controller' => array(
            'input_filter' => 'API\\V1\\Rest\\Organizers\\Validator',
        ),
        'API\\V1\\Rest\\Presenters\\Controller' => array(
            'input_filter' => 'API\\V1\\Rest\\Presenters\\Validator',
        ),
        'API\\V1\\Rest\\Rooms\\Controller'      => array(
            'input_filter' => 'API\\V1\\Rest\\Rooms\\Validator',
        ),
        'API\\V1\\Rest\\Sessions\\Controller'   => array(
            'input_filter' => 'API\\V1\\Rest\\Sessions\\Validator',
        ),
        'API\\V1\\Rest\\Venues\\Controller'     => array(
            'input_filter' => 'API\\V1\\Rest\\Venues\\Validator',
        ),
        'API\\V1\\Rest\\Series\\Controller'     => array(
            'input_filter' => 'API\\V1\\Rest\\Series\\Validator',
        ),
    ),
    'input_filter_specs'     => array(
        'API\\V1\\Rest\\Events\\Validator'     => array(
            0 => array(
                'name'              => 'start',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(
                    0 => array(
                        'name'    => 'Zend\\I18n\\Validator\\DateTime',
                        'options' => array(
                            'format' => 'U',
                        ),
                    ),
                ),
                'description'       => 'Earliest event start date / time',
                'error_message'     => 'This doesn\'t seem to be a valid date / time value',
                'allow_empty'       => false,
                'continue_if_empty' => false,
            ),
            1 => array(
                'name'              => 'end',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(
                    0 => array(
                        'name'    => 'Zend\\I18n\\Validator\\DateTime',
                        'options' => array(
                            'format' => 'U',
                        ),
                    ),
                ),
                'error_message'     => 'This doesn\'t seem to be a valid date / time value',
                'description'       => 'Latest event end date',
                'allow_empty'       => false,
                'continue_if_empty' => false,
            ),
            2 => array(
                'name'              => 'flat',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(),
                'description'       => 'Whether to dereference all embedded entities',
                'allow_empty'       => true,
                'continue_if_empty' => true,
                'error_message'     => 'This doesn\'t seem to be a valid integer',
            ),
        ),
        'API\\V1\\Rest\\Days\\Validator'       => array(
            0 => array(
                'name'              => 'flat',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(),
                'description'       => 'Whether to dereference all embedded entities',
                'allow_empty'       => true,
                'continue_if_empty' => true,
                'error_message'     => 'This doesn\'t seem to be a valid integer',
            ),
        ),
        'API\\V1\\Rest\\Organizers\\Validator' => array(
            0 => array(
                'name'              => 'flat',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(),
                'description'       => 'Whether to dereference all embedded entities',
                'allow_empty'       => true,
                'continue_if_empty' => true,
                'error_message'     => 'This doesn\'t seem to be a valid integer',
            ),
        ),
        'API\\V1\\Rest\\Presenters\\Validator' => array(
            0 => array(
                'name'              => 'flat',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(),
                'description'       => 'Whether to dereference all embedded entities',
                'allow_empty'       => true,
                'continue_if_empty' => true,
                'error_message'     => 'This doesn\'t seem to be a valid integer',
            ),
        ),
        'API\\V1\\Rest\\Rooms\\Validator'      => array(
            0 => array(
                'name'              => 'flat',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(),
                'description'       => 'Whether to dereference all embedded entities',
                'allow_empty'       => true,
                'continue_if_empty' => true,
                'error_message'     => 'This doesn\'t seem to be a valid integer',
            ),
        ),
        'API\\V1\\Rest\\Sessions\\Validator'   => array(
            0 => array(
                'name'              => 'flat',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(
                    0 => array(
                        'name' => 'API\\V1\\Validator\\ListOfInteger',
                    ),
                ),
                'description'       => 'Whether to dereference all embedded entities',
                'allow_empty'       => true,
                'continue_if_empty' => true,
                'error_message'     => 'This doesn\'t seem to be a valid integer',
            ),
            1 => array(
                'name'              => 'tag',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(),
                'description'       => 'Tag or list of tags to be matched',
                'allow_empty'       => true,
                'continue_if_empty' => false,
                'error_message'     => 'This doesnt seem to be a valid list of integers',
            ),
            2 => array(
                'name'              => 'level',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(),
                'allow_empty'       => true,
                'continue_if_empty' => false,
                'description'       => 'Level or list of levels to be matched',
                'error_message'     => 'This doesnt seem to be a valid list of integers',
            ),
        ),
        'API\\V1\\Rest\\Venues\\Validator'     => array(
            0 => array(
                'name'              => 'flat',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(),
                'description'       => 'Whether to dereference all embedded entities',
                'allow_empty'       => true,
                'continue_if_empty' => true,
                'error_message'     => 'This doesn\'t seem to be a valid integer',
            ),
        ),
        'API\\V1\\Rest\\Series\\Validator'     => array(
            0 => array(
                'name'              => 'flat',
                'required'          => false,
                'filters'           => array(),
                'validators'        => array(),
                'description'       => 'Whether to dereference all embedded entities',
                'allow_empty'       => true,
                'continue_if_empty' => true,
                'error_message'     => 'This doesn\'t seem to be a valid integer',
            ),
        ),
    ),
);
