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

/** @var $get \Laravel\Lumen\Application */

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->get('/', function () use ($app) {
    return "Ævintýri RESTful API by Joschi Kuphal / tollwerk GmbH (https://jkphl.is)";
});

$app->group(['prefix' => 'api/v2', 'namespace' => 'App\Http\Controllers'], function (\Laravel\Lumen\Application $app) {

    // Return a list of API methods
    $app->get('/', function () use ($app) {
        $apiMethods = [];
        foreach ($app->getRoutes() as $route) {
            if (($route['method'] == 'GET') && preg_match("%^/api/v2/([a-z]+)$%",
                    $route['uri']) && is_array($route['action'])
            ) {
                $apiMethods[$route['action']['as']] = $route['uri'];
            }
        }

        return $apiMethods;
    });

    // Country
    $app->get('country', [
        'as'   => 'countries',
        'uses' => 'CountryController@listCountries'
    ]);
    $app->get('country/{id}', [
        'as'   => 'country',
        'uses' => 'CountryController@getCountry'
    ]);

    // Day
    $app->get('day', [
        'as'   => 'days',
        'uses' => 'DayController@listDays'
    ]);
    $app->get('day/{id}', [
        'as'   => 'day',
        'uses' => 'DayController@getDay'
    ]);
    $app->post('day', 'DayController@createDay');
    $app->put('day/{id}', 'DayController@updateDay');
    $app->delete('day/{id}', 'DayController@deleteDay');

    // Event
    $app->get('event', [
        'as'   => 'events',
        'uses' => 'EventController@listEvents'
    ]);
    $app->get('event/{id}', [
        'as'   => 'event',
        'uses' => 'EventController@getEvent'
    ]);
    $app->post('event', 'EventController@createEvent');
    $app->put('event/{id}', 'EventController@updateEvent');
    $app->delete('event/{id}', 'EventController@deleteEvent');

    // Link
    $app->get('link', [
        'as'   => 'links',
        'uses' => 'LinkController@listLinks'
    ]);
    $app->get('link/{id}', [
        'as'   => 'link',
        'uses' => 'LinkController@getLink'
    ]);
    $app->post('link', 'LinkController@createLink');
    $app->put('link/{id}', 'LinkController@updateLink');
    $app->delete('link/{id}', 'LinkController@deleteLink');

    // Organizer
    $app->get('organizer', [
        'as'   => 'organizers',
        'uses' => 'OrganizerController@listOrganizers'
    ]);
    $app->get('organizer/{id}', [
        'as'   => 'organizer',
        'uses' => 'OrganizerController@getOrganizer'
    ]);
    $app->post('organizer', 'OrganizerController@createOrganizer');
    $app->put('organizer/{id}', 'OrganizerController@updateOrganizer');
    $app->delete('organizer/{id}', 'OrganizerController@deleteOrganizer');

    // Presenter
    $app->get('presenter', [
        'as'   => 'presenters',
        'uses' => 'PresenterController@listPresenters'
    ]);
    $app->get('presenter/{id}', [
        'as'   => 'presenter',
        'uses' => 'PresenterController@getPresenter'
    ]);
    $app->post('presenter', 'PresenterController@createPresenter');
    $app->put('presenter/{id}', 'PresenterController@updatePresenter');
    $app->delete('presenter/{id}', 'PresenterController@deletePresenter');

    // Room
    $app->get('room', [
        'as'   => 'rooms',
        'uses' => 'RoomController@listRooms'
    ]);
    $app->get('room/{id}', [
        'as'   => 'room',
        'uses' => 'RoomController@getRoom'
    ]);
    $app->post('room', 'RoomController@createRoom');
    $app->put('room/{id}', 'RoomController@updateRoom');
    $app->delete('room/{id}', 'RoomController@deleteRoom');

    // Session
    $app->get('session', [
        'as'   => 'sessions',
        'uses' => 'SessionController@listSessions'
    ]);
    $app->get('session/{id}', [
        'as'   => 'session',
        'uses' => 'SessionController@getSession'
    ]);
    $app->post('session', 'SessionController@createSession');
    $app->put('session/{id}', 'SessionController@updateSession');
    $app->delete('session/{id}', 'SessionController@deleteSession');

    // Series
    $app->get('series', [
        'as'   => 'seriess',
        'uses' => 'SeriesController@listSeries'
    ]);
    $app->get('series/{id}', [
        'as'   => 'series',
        'uses' => 'SeriesController@getSeries'
    ]);
    $app->post('series', 'SeriesController@createSeries');
    $app->put('series/{id}', 'SeriesController@updateSeries');
    $app->delete('series/{id}', 'SeriesController@deleteSeries');

    // Tag
    $app->get('tag', [
        'as'   => 'tags',
        'uses' => 'TagController@listTags'
    ]);
    $app->get('tag/{id}', [
        'as'   => 'tag',
        'uses' => 'TagController@getTag'
    ]);
    $app->post('tag', 'TagController@createTag');
    $app->put('tag/{id}', 'TagController@updateTag');
    $app->delete('tag/{id}', 'TagController@deleteTag');

    // Venue
    $app->get('venue', [
        'as'   => 'venues',
        'uses' => 'VenueController@listVenues'
    ]);
    $app->get('venue/{id}', [
        'as'   => 'venue',
        'uses' => 'VenueController@getVenue'
    ]);
    $app->post('venue', 'VenueController@createVenue');
    $app->put('venue/{id}', 'VenueController@updateVenue');
    $app->delete('venue/{id}', 'VenueController@deleteVenue');
});