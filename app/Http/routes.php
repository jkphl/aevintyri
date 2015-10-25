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

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->get('/', function () use ($app) {
    return "Ævintýri RESTful API by Joschi Kuphal / tollwerk GmbH (https://jkphl.is)";
});

$app->group(['prefix' => 'api/v1', 'namespace' => 'App\Http\Controllers'], function ($app) {

    // Country
    $app->get('country', 'CountryController@listCountries');
    $app->get('country/{id}', 'CountryController@getCountry');

    // Day
    $app->get('day', 'DayController@listDays');
    $app->get('day/{id}', 'DayController@getDay');
    $app->post('day', 'DayController@createDay');
    $app->put('day/{id}', 'DayController@updateDay');
    $app->delete('day/{id}', 'DayController@deleteDay');

    // Event
    $app->get('event', 'EventController@listEvents');
    $app->get('event/{id}', 'EventController@getEvent');
    $app->post('event', 'EventController@createEvent');
    $app->put('event/{id}', 'EventController@updateEvent');
    $app->delete('event/{id}', 'EventController@deleteEvent');

    // Link
    $app->get('link', 'LinkController@listLinks');
    $app->get('link/{id}', 'LinkController@getLink');
    $app->post('link', 'LinkController@createLink');
    $app->put('link/{id}', 'LinkController@updateLink');
    $app->delete('link/{id}', 'LinkController@deleteLink');
    
    // Organizer
    $app->get('organizer', 'OrganizerController@listOrganizers');
    $app->get('organizer/{id}', 'OrganizerController@getOrganizer');
    $app->post('organizer', 'OrganizerController@createOrganizer');
    $app->put('organizer/{id}', 'OrganizerController@updateOrganizer');
    $app->delete('organizer/{id}', 'OrganizerController@deleteOrganizer');
    
    // Presenter
    $app->get('presenter', 'PresenterController@listPresenters');
    $app->get('presenter/{id}', 'PresenterController@getPresenter');
    $app->post('presenter', 'PresenterController@createPresenter');
    $app->put('presenter/{id}', 'PresenterController@updatePresenter');
    $app->delete('presenter/{id}', 'PresenterController@deletePresenter');
    
    // presenter_tag
    // question
    
    // Room
    $app->get('room', 'RoomController@listRooms');
    $app->get('room/{id}', 'RoomController@getRoom');
    $app->post('room', 'RoomController@createRoom');
    $app->put('room/{id}', 'RoomController@updateRoom');
    $app->delete('room/{id}', 'RoomController@deleteRoom');
    
    // Session
    $app->get('session', 'SessionController@listSessions');
    $app->get('session/{id}', 'SessionController@getSession');
    $app->post('session', 'SessionController@createSession');
    $app->put('session/{id}', 'SessionController@updateSession');
    $app->delete('session/{id}', 'SessionController@deleteSession');

    // Series
    $app->get('series', 'SeriesController@listSeriess');
    $app->get('series/{id}', 'SeriesController@getSeries');
    $app->post('series', 'SeriesController@createSeries');
    $app->put('series/{id}', 'SeriesController@updateSeries');
    $app->delete('series/{id}', 'SeriesController@deleteSeries');
    
    // session_presenter
    // session_tag
    
    // Tag
    $app->get('tag', 'TagController@listTags');
    $app->get('tag/{id}', 'TagController@getTag');
    $app->post('tag', 'TagController@createTag');
    $app->put('tag/{id}', 'TagController@updateTag');
    $app->delete('tag/{id}', 'TagController@deleteTag');
    
    // user
    // usergroup
    
    // Venue
    $app->get('venue', 'VenueController@listVenues');
    $app->get('venue/{id}', 'VenueController@getVenue');
    $app->post('venue', 'VenueController@createVenue');
    $app->put('venue/{id}', 'VenueController@updateVenue');
    $app->delete('venue/{id}', 'VenueController@deleteVenue');
});