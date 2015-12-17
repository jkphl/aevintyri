Ævintýri
========

is a sophisticated event scheduling platform featuring organizers, venues, rooms, presenters, event series, events and sessions, featuring a [JSON API](http://jsonapi.org) compliant REST/CRUD interface. It's built using the [Lumen Micro-Framework](http://lumen.laravel.com).


REST API
--------

The current versions of the REST API endpoints are grouped under the path `/api/v2/`. In fact, there's an endpoint available at that very path, returning a JSON object of all available `GET` endpoints:

```json
{
  "countries": "/api/v2/country",
  "days": "/api/v2/day",
  "events": "/api/v2/event",
  "links": "/api/v2/link",
  "organizers": "/api/v2/organizer",
  "presenters": "/api/v2/presenter",
  "rooms": "/api/v2/room",
  "sessions": "/api/v2/session",
  "seriess": "/api/v2/series",
  "tags": "/api/v2/tag",
  "venues": "/api/v2/venue"
}
```

Each of these endpoints can be called for retrieving a [list of records](#list-endpoints) or a [single record](#record-endpoints) (by appending `/{id}` to the endpoint URL). In both cases the API will respond with a JSON object that conforms to the [JSON API 1.0](http://jsonapi.org/) specification:

```json
{
  "jsonapi": {
    "version": "1.0"
  },
  "links": {
    "self": "http://aevintyri.tollwerk.de/api/v2/link",
    "pagination": {}
  },
  "data": [],
  "included": []
}
```

Property        | Description
----------------|-----------------------------------------------------------------
`jsonapi`       | This object shows the JSON API version.
`links`         | This object always contains the absolute URL of the very request (`self`) and an optional [`pagination`](#pagination) object with links to the first, previous, next and last pagination pages.
`data`          | This property is either a [list of records](#list-endpoints) or a [single record](#record-endpoints), depending on whether the request had a record ID appended
`included`      | This optional property contains all [related records](#including-related-records) associated with the request's primary data (if requested)

### List endpoints

The following endpoints deliver record lists:

* `/api/v2/country`
* `/api/v2/day`
* `/api/v2/event`
* `/api/v2/link`
* `/api/v2/organizer`
* `/api/v2/presenter`
* `/api/v2/room`
* `/api/v2/session`
* `/api/v2/series`
* `/api/v2/tag`
* `/api/v2/venue`

The JSON response of these endpoints looks somewhat like this (example is for `/api/v2/link`):

```json
{
  "jsonapi": {
    "version": "1.0"
  },
  "links": {
    "self": "http://aevintyri.tollwerk.de/api/v2/link"
  },
  "data": [
    {
      "type": "link",
      "id": "1",
      "attributes": {
        "created_at": "2015-12-17T17:16:12+00:00",
        "updated_at": "2015-12-17T17:16:12+00:00",
        "name": "Joschi's website",
        "url": "https//jkphl.is"
      },
      "links": {
        "self": "http://aevintyri.tollwerk.de/api/v2/link/1"
      }
    },
    {
	  "type": "link",
	  "id": "2",
	  "attributes": {
		"created_at": "2015-12-17T17:16:12+00:00",
		"updated_at": "2015-12-17T17:16:12+00:00",
		"name": "Tollwerk website",
		"url": "https//tollwerk.de"
	  },
	  "links": {
		"self": "http://aevintyri.tollwerk.de/api/v2/link/2"
	  }
	}
  ]
}
```

The `data` property is an array of [single records](#record-endpoints). 


### Record endpoints

Record endpoints are used for fetching single records. Here's a response example for `/api/v2/room/1` (i.e. fetching the `room` record with ID `1`):

```json
{
  "jsonapi": {
    "version": "1.0"
  },
  "links": {
    "self": "http://aevintyri.tollwerk.de/api/v2/room/1"
  },
  "data": {
    "type": "room",
    "id": "1",
    "attributes": {
      "created_at": "2015-12-17T17:16:13+00:00",
      "updated_at": "2015-12-17T17:16:13+00:00",
      "description": "\n"
    },
    "relationships": {
      "venue": {
        "data": {
          "type": "venue",
          "id": "1"
        }
      }
    },
    "links": {
      "self": "http://aevintyri.tollwerk.de/api/v2/room/1"
    }
  }
}
```

In this case, the `data` property is a single record object with the following structure:

Property        | Description
----------------|-----------------------------------------------------------------
`type`          | Record type
`id`            | Record ID
`attributes`    | Scalar record attributes
`relationships` | This optional property contains references to all [related records](#including-related-records) that **directly depend** on the current record (`1:1` and `1:n` relations). One may also include `n:1` and `n:m` relations by switching on [extended relationships](#extending-record-relationships).

The related records will only ever be listed by `type` and `id`. If you need the fully-fledged related records, you either have to

* make another [record endpoint](#record-endpoints) request for the particular record, or
* [include the related records](#including-related-records) in the current request.

### Including related records

You may include the fully-fledged related records in both [record list](#list-endpoints) and [single record](#record-endpoints) requests by adding the query parameter `include` to the endpoint URL. Valid values are:

* a single related record type to be included, e.g. `include=venue`
* a comma separated list of record types, e.g. `include=series,organizer`
* multiple levels of related records, separated by a dot, e.g. `include=venue,venue.country`
* a wildcard for all directly related records, e.g. `include=*`
* a double wildcard for all recursively related records, e.g. `include=**` (extension to the JSON API specification)

The included record relationships show the same structure als the request's primary record(s) held by `data`. For the example above, recursively including all related records (`/api/v2/room/1?include=**`) would result in:

```json
{
  "jsonapi": {
    "version": "1.0"
  },
  "links": {
    "self": "http://aevintyri.tollwerk.de/api/v2/room/1"
  },
  "data": {
    "type": "room",
    "id": "1",
    "attributes": {
      "created_at": "2015-12-17T17:16:13+00:00",
      "updated_at": "2015-12-17T17:16:13+00:00",
      "description": "\n"
    },
    "relationships": {
      "venue": {
        "data": {
          "type": "venue",
          "id": "1"
        }
      }
    },
    "links": {
      "self": "http://aevintyri.tollwerk.de/api/v2/room/1"
    }
  },
  "included": [
    {
      "type": "country",
      "id": "276",
      "attributes": {
        "created_at": "2015-12-17T17:16:12+00:00",
        "updated_at": "2015-12-17T17:16:12+00:00",
        "name": "Germany"
      },
      "links": {
        "self": "http://aevintyri.tollwerk.de/api/v2/country/276"
      }
    },
    {
      "type": "venue",
      "id": "1",
      "attributes": {
        "created_at": "2015-12-17T17:16:13+00:00",
        "updated_at": "2015-12-17T17:16:13+00:00",
        "name": "Orpheum-Lichtspielhaus",
        "street_address_1": "Johannisstraße 32a",
        "postal_code": "90419",
        "locality": "Nürnberg",
        "region": "Bayern",
        "latitude": 49.45814,
        "longitude": 11.06674,
        "image": "http://aevintyri.tollwerk.de/img/venue/venue-1.jpg",
        "hashtag": "Orpheum",
        "description": "<p>Das historische Orpheum-Lichtspielhaus wurde 1910 als glamouröses Kino im Nürnberger Stadtteil St. Johannis errichtet. Den zweiten Weltkrieg überstand das Gebäude nur schwer beschädigt und wurde 1948 restauriert wiedereröffnet. Der Siegeszug des Fernsehens zwang das Kino in den 60er Jahren, seinen Betrieb einzustellen. Bis in die späten 90er Jahre wurde das Kino daraufhin als Supermarkt genutzt und schließlich in einem ruinösen Zustand geschlossen. Seit seiner erneuten Restaurierung im Jahr 2010 dient es gelegentlich als Veranstaltungsort.</p>\n",
        "abstract": "Ehemaliges Jugendstil-Kino im Herzen des Nürnberger Stadtteils St. Johannis"
      },
      "relationships": {
        "country": {
          "data": {
            "type": "country",
            "id": "276"
          }
        }
      },
      "links": {
        "self": "http://aevintyri.tollwerk.de/api/v2/venue/1"
      }
    }
  ]
}
```

### Extending record relationships

Related records that reference the primary subject via am `n:1` or `n:m` relation are not included in the relationships by default. You may enable them by adding the query parameter `extend` to the endpoint URI. Valid values are:
                                                                                                                                                                        
* a single related record type to be extended, e.g. `extend=sessions`
* a comma separated list of record types, e.g. `extend=sessions,presenters`
* a wildcard for all indirectly related records, e.g. `extend=*`

For the example above, extending all indirectly related records (`/api/v2/room/1?extend=*`) would result in:

```json
{
  "jsonapi": {
    "version": "1.0"
  },
  "links": {
    "self": "http://aevintyri.tollwerk.de/api/v2/room/1"
  },
  "data": {
    "type": "room",
    "id": "1",
    "attributes": {
      "created_at": "2015-12-17T17:16:13+00:00",
      "updated_at": "2015-12-17T17:16:13+00:00",
      "description": "\n"
    },
    "relationships": {
      "venue": {
        "data": {
          "type": "venue",
          "id": "1"
        }
      },
      "sessions": {
        "data": [
          {
            "type": "session",
            "id": "55"
          },
          {
            "type": "session",
            "id": "58"
          }
        ]
      }
    },
    "links": {
      "self": "http://aevintyri.tollwerk.de/api/v2/room/1"
    }
  }
}
```

Here, the records of type `session` are indirectly related. As with regular relationships you may also [include them](#including-related-records) into the response by adding an appropriate `include` query parameter.

### Pagination

You may fetch paginated list results by adding the `page` query parameter to any of the [list endpoints](#list-endpoints):
 
Property        | Description
----------------|-----------------------------------------------------------------
`page[size]`    | Sets the max. number or records returned per request. `0` is equivalent to unlimited.
`page[number]`  | Specifies the page offset (zero based).

Adding the `page` parameters will trigger pagination links to be returned as part of the response (`/api/v2/tag?page[size]=3&page[number]=2`):

```json
{
  "jsonapi": {
    "version": "1.0"
  },
  "links": {
    "self": "http://aevintyri.tollwerk.de/api/v2/tag?page%5Bnumber%5D=2&page%5Bsize%5D=3",
    "pagination": {
      "first": "http://aevintyri.tollwerk.de/api/v2/tag?page%5Bsize%5D=3",
      "last": "http://aevintyri.tollwerk.de/api/v2/tag?page%5Bsize%5D=3&page%5Bnumber%5D=6",
      "prev": "http://aevintyri.tollwerk.de/api/v2/tag?page%5Bsize%5D=3&page%5Bnumber%5D=1",
      "next": "http://aevintyri.tollwerk.de/api/v2/tag?page%5Bsize%5D=3&page%5Bnumber%5D=3"
    }
  },
  "data": [
    {
      "type": "tag",
      "id": "7",
      "attributes": {
        "created_at": "2015-12-17T17:16:13+00:00",
        "updated_at": "2015-12-17T17:16:13+00:00",
        "name": "Networking",
        "color": "#1ac508"
      },
      "links": {
        "self": "http://aevintyri.tollwerk.de/api/v2/tag/7"
      }
    },
    {
      "type": "tag",
      "id": "8",
      "attributes": {
        "created_at": "2015-12-17T17:16:13+00:00",
        "updated_at": "2015-12-17T17:16:13+00:00",
        "name": "Kreativkultur",
        "color": "#e6960e"
      },
      "links": {
        "self": "http://aevintyri.tollwerk.de/api/v2/tag/8"
      }
    },
    {
      "type": "tag",
      "id": "9",
      "attributes": {
        "created_at": "2015-12-17T17:16:13+00:00",
        "updated_at": "2015-12-17T17:16:13+00:00",
        "name": "Vorträge, Workshops & Pitches",
        "color": "#c45a64"
      },
      "links": {
        "self": "http://aevintyri.tollwerk.de/api/v2/tag/9"
      }
    }
  ]
}
```

### Event requests

In addition to the general API features the **event list controller** supports another two query parameters for filtering the event results by **start and end date**:
  
Property        | Description
----------------|-----------------------------------------------------------------
`from`          | A minimum start date and time in any format that's [accepted by PHP's DateTime class](http://php.net/manual/de/datetime.formats.php). I recommend and ISO 8601 date representation, e.g. `2015-12-17` or `2015-12-17T20:23:05`
`to`            | A maximum end date and time in any format that's [accepted by PHP's DateTime class](http://php.net/manual/de/datetime.formats.php). I recommend and ISO 8601 date representation, e.g. `2015-12-17` or `2015-12-17T20:23:05`

The filters are applied to the event's first respectively last session.

For a single-shot retrieval of **all events and related records within a particular date range**, you would use something like this:
 
	/api/v2/event?from=2014-10-13T00:00:00&to2014-10-20T23:59:59&include=**&extend=*