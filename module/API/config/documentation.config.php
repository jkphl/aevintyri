<?php
return array(
    'API\\V1\\Rest\\Events\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'description' => 'Retrieve a paginated list of events',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/events"
       },
       "first": {
           "href": "/api/events?page={page}"
       },
       "prev": {
           "href": "/api/events?page={page}"
       },
       "next": {
           "href": "/api/events?page={page}"
       },
       "last": {
           "href": "/api/events?page={page}"
       }
   }
   "_embedded": {
       "events": [
           {
               "_links": {
                   "self": {
                       "href": "/api/events[/:event_id]"
                   }
               }
              "start": "Earliest event start date / time",
              "end": "Latest event end date",
              "flat": "Whether to dereference all embedded entities"
           }
       ]
   }
}',
            ),
            'description' => 'Interact with event collections',
        ),
        'entity' => array(
            'GET' => array(
                'description' => 'Retrieve a single event',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/events[/:event_id]"
       }
   }
   "start": "Earliest event start date / time",
   "end": "Latest event end date",
   "flat": "Whether to dereference all embedded entities"
}',
            ),
            'description' => 'Interact with a single event',
        ),
        'description' => 'Event API',
    ),
    'API\\V1\\Rest\\Tags\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'description' => 'Retrieve a paginated list of tags',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/tags"
       },
       "first": {
           "href": "/api/tags?page={page}"
       },
       "prev": {
           "href": "/api/tags?page={page}"
       },
       "next": {
           "href": "/api/tags?page={page}"
       },
       "last": {
           "href": "/api/tags?page={page}"
       }
   }
   "_embedded": {
       "tags": [
           {
               "_links": {
                   "self": {
                       "href": "/api/tags[/:tags_id]"
                   }
               }
           }
       ]
   }
}',
            ),
            'description' => 'Interact with tag collections',
        ),
        'entity' => array(
            'GET' => array(
                'description' => 'Retrieve a single tag',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/tags[/:tags_id]"
       }
   }
}',
            ),
            'description' => 'Interact with a single tag',
        ),
        'description' => 'Tags API',
    ),
    'API\\V1\\Rest\\Organizers\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'description' => 'Retrieve a paginated list of organizers',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/organizers"
       },
       "first": {
           "href": "/api/organizers?page={page}"
       },
       "prev": {
           "href": "/api/organizers?page={page}"
       },
       "next": {
           "href": "/api/organizers?page={page}"
       },
       "last": {
           "href": "/api/organizers?page={page}"
       }
   }
   "_embedded": {
       "organizers": [
           {
               "_links": {
                   "self": {
                       "href": "/api/organizers[/:organizers_id]"
                   }
               }
              "flat": "Whether to dereference all embedded entities"
           }
       ]
   }
}',
            ),
            'description' => 'Interact with organizer collections',
        ),
        'entity' => array(
            'GET' => array(
                'description' => 'Retrieve a single organizer',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/organizers[/:organizers_id]"
       }
   }
   "flat": "Whether to dereference all embedded entities"
}',
            ),
            'description' => 'Interact with a single organizer',
        ),
        'description' => 'Organizers API',
    ),
    'API\\V1\\Rest\\Countries\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'description' => 'Retrieve a paginated list of countries',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/countries"
       },
       "first": {
           "href": "/countries?page={page}"
       },
       "prev": {
           "href": "/countries?page={page}"
       },
       "next": {
           "href": "/countries?page={page}"
       },
       "last": {
           "href": "/countries?page={page}"
       }
   }
   "_embedded": {
       "countries": [
           {
               "_links": {
                   "self": {
                       "href": "/countries[/:countries_id]"
                   }
               }
           }
       ]
   }
}',
            ),
            'description' => 'Interact with country collections',
        ),
        'entity' => array(
            'GET' => array(
                'description' => 'Retrieve a single country',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/countries[/:countries_id]"
       }
   }
}',
            ),
            'description' => 'Interact with a single country',
        ),
        'description' => 'Countries API',
    ),
    'API\\V1\\Rest\\Venues\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'description' => 'Retrieve a paginated list of venues',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/venues"
       },
       "first": {
           "href": "/api/venues?page={page}"
       },
       "prev": {
           "href": "/api/venues?page={page}"
       },
       "next": {
           "href": "/api/venues?page={page}"
       },
       "last": {
           "href": "/api/venues?page={page}"
       }
   }
   "_embedded": {
       "venues": [
           {
               "_links": {
                   "self": {
                       "href": "/api/venues[/:venues_id]"
                   }
               }
              "flat": "Whether to dereference all embedded entities"
           }
       ]
   }
}',
            ),
            'description' => 'Interact with venue collections',
        ),
        'entity' => array(
            'GET' => array(
                'description' => 'Retrieve a single venue',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/venues[/:venues_id]"
       }
   }
   "flat": "Whether to dereference all embedded entities"
}',
            ),
            'description' => 'Interact with a single venue',
        ),
        'description' => 'Venues API',
    ),
    'API\\V1\\Rest\\Days\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'description' => 'Retrieve a paginated list of days',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/days"
       },
       "first": {
           "href": "/api/days?page={page}"
       },
       "prev": {
           "href": "/api/days?page={page}"
       },
       "next": {
           "href": "/api/days?page={page}"
       },
       "last": {
           "href": "/api/days?page={page}"
       }
   }
   "_embedded": {
       "days": [
           {
               "_links": {
                   "self": {
                       "href": "/api/days[/:days_id]"
                   }
               }
              "flat": "Whether to dereference all embedded entities"
           }
       ]
   }
}',
            ),
            'description' => 'Interact with day collections',
        ),
        'entity' => array(
            'GET' => array(
                'description' => 'Retrieve a single day',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/days[/:days_id]"
       }
   }
   "flat": "Whether to dereference all embedded entities"
}',
            ),
            'description' => 'Interact with a single day',
        ),
        'description' => 'Days API',
    ),
    'API\\V1\\Rest\\Links\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'description' => 'Retrieve a paginated list of links',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/links"
       },
       "first": {
           "href": "/links?page={page}"
       },
       "prev": {
           "href": "/links?page={page}"
       },
       "next": {
           "href": "/links?page={page}"
       },
       "last": {
           "href": "/links?page={page}"
       }
   }
   "_embedded": {
       "links": [
           {
               "_links": {
                   "self": {
                       "href": "/links[/:links_id]"
                   }
               }
           }
       ]
   }
}',
            ),
            'description' => 'Interact with link collections',
        ),
        'entity' => array(
            'GET' => array(
                'description' => 'Retrieve a single link',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/links[/:links_id]"
       }
   }
}',
            ),
            'description' => 'Interact with a single link',
        ),
        'description' => 'Links API',
    ),
    'API\\V1\\Rest\\Presenters\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'description' => 'Retrieve a paginated list of presenters',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/presenters"
       },
       "first": {
           "href": "/api/presenters?page={page}"
       },
       "prev": {
           "href": "/api/presenters?page={page}"
       },
       "next": {
           "href": "/api/presenters?page={page}"
       },
       "last": {
           "href": "/api/presenters?page={page}"
       }
   }
   "_embedded": {
       "presenters": [
           {
               "_links": {
                   "self": {
                       "href": "/api/presenters[/:presenters_id]"
                   }
               }
              "flat": "Whether to dereference all embedded entities"
           }
       ]
   }
}',
            ),
            'description' => 'Interact with presenter collections',
        ),
        'entity' => array(
            'GET' => array(
                'description' => 'Retrieve a single presenter',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/presenters[/:presenters_id]"
       }
   }
   "flat": "Whether to dereference all embedded entities"
}',
            ),
            'description' => 'Interact with a single presenter',
        ),
        'description' => 'Presenters API',
    ),
    'API\\V1\\Rest\\Rooms\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'description' => 'Retrieve a paginated list of rooms',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/rooms"
       },
       "first": {
           "href": "/api/rooms?page={page}"
       },
       "prev": {
           "href": "/api/rooms?page={page}"
       },
       "next": {
           "href": "/api/rooms?page={page}"
       },
       "last": {
           "href": "/api/rooms?page={page}"
       }
   }
   "_embedded": {
       "rooms": [
           {
               "_links": {
                   "self": {
                       "href": "/api/rooms[/:rooms_id]"
                   }
               }
              "flat": "Whether to dereference all embedded entities"
           }
       ]
   }
}',
            ),
            'description' => 'Interact with room collections',
        ),
        'entity' => array(
            'GET' => array(
                'description' => 'Retrieve a single room',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/rooms[/:rooms_id]"
       }
   }
   "flat": "Whether to dereference all embedded entities"
}',
            ),
            'description' => 'Interact with a single room',
        ),
        'description' => 'Rooms API',
    ),
    'API\\V1\\Rest\\Sessions\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'description' => 'Retrieve a paginated list of sessions',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/sessions"
       },
       "first": {
           "href": "/api/sessions?page={page}"
       },
       "prev": {
           "href": "/api/sessions?page={page}"
       },
       "next": {
           "href": "/api/sessions?page={page}"
       },
       "last": {
           "href": "/api/sessions?page={page}"
       }
   }
   "_embedded": {
       "sessions": [
           {
               "_links": {
                   "self": {
                       "href": "/api/sessions[/:sessions_id]"
                   }
               }
              "flat": "Whether to dereference all embedded entities"
           }
       ]
   }
}',
            ),
            'description' => 'Interact with session collections',
        ),
        'entity' => array(
            'GET' => array(
                'description' => 'Retrieve a single session',
                'request' => null,
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/sessions[/:sessions_id]"
       }
   }
   "flat": "Whether to dereference all embedded entities"
}',
            ),
            'description' => 'Interact with a single series',
        ),
        'description' => 'Sessions API',
    ),
    'API\\V1\\Rest\\Series\\Controller' => array(
    		'collection' => array(
    				'GET' => array(
    						'description' => 'Retrieve a paginated list of series',
    						'request' => null,
    						'response' => '{
   "_links": {
       "self": {
           "href": "/api/series"
       },
       "first": {
           "href": "/api/series?page={page}"
       },
       "prev": {
           "href": "/api/series?page={page}"
       },
       "next": {
           "href": "/api/series?page={page}"
       },
       "last": {
           "href": "/api/series?page={page}"
       }
   }
   "_embedded": {
       "series": [
           {
               "_links": {
                   "self": {
                       "href": "/api/series[/:series_id]"
                   }
               }
              "flat": "Whether to dereference all embedded entities"
           }
       ]
   }
}',
    				),
    				'description' => 'Interact with series collections',
    		),
    		'entity' => array(
    				'GET' => array(
    						'description' => 'Retrieve a single series',
    						'request' => null,
    						'response' => '{
   "_links": {
       "self": {
           "href": "/api/series[/:series_id]"
       }
   }
   "flat": "Whether to dereference all embedded entities"
}',
    				),
    				'description' => 'Interact with a single series',
    		),
        'description' => 'Series API',
    ),
);
