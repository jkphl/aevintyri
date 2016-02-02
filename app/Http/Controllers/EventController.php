<?php

/**
 * aevintyri
 *
 * @category    Apparat
 * @package     Apparat_<Package>
 * @author      Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @copyright   Copyright © 2015 Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @license     http://opensource.org/licenses/MIT	The MIT License (MIT)
 */

/***********************************************************************************
 *  The MIT License (MIT)
 *
 *  Copyright © 2015 Joschi Kuphal <joschi@kuphal.net> / @jkphl
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy of
 *  this software and associated documentation files (the "Software"), to deal in
 *  the Software without restriction, including without limitation the rights to
 *  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 *  the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 *  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 ***********************************************************************************/

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
	/**
	 * List all events
	 *
	 * @return \Symfony\Component\HttpFoundation\Response Event list
	 */
	public function listEvents()
	{
		$event = new Event();
//		$expand = [];

//        // Determine the columns to expand
//        $expand = trim($this->_request()->get('expand', ''));
//        $expand = ($expand === '*') ? $event->getAppends() : array_filter(array_map('trim', explode(',', $expand)));
//        $expand = array_intersect($expand, $event->getAppends());

		$from = trim($this->_request()->get('from', ''));
		try {
			$from = strlen($from) ? new \DateTimeImmutable($from) : null;
		} catch (\Exception $e) {
			return $this->error(400, 'Bad request (from constraint)');
		}
		$to = trim($this->_request()->get('to', ''));
		try {
			$to = strlen($to) ? new \DateTimeImmutable($to) : null;
		} catch (\Exception $e) {
			return $this->error(400, 'Bad request (from constraint)');
		}

		// Build the event query
		$eventQuery = $event->newQuery();
		$eventQuery->getQuery()->select(['events.*'])
			->join('days', function (JoinClause $query) use ($from, $to) {
				$query->on('days.event_id', '=', 'events.id');
				$query->where('days.deleted_at', '<=>', null);
				if ($from) {
					$query->where('days.date', '>=', $from);
				}
				if ($to) {
					$query->where('days.date', '<=', $to);
				}
			})
			->join('sessions', function (JoinClause $query) use ($from, $to) {
				$query->on('sessions.day_id', '=', 'days.id');
				$query->where('sessions.deleted_at', '<=>', null);
				if ($from) {
					$query->where(DB::raw('days.date + INTERVAL sessions.start_time HOUR_SECOND'), '>=', $from);
				}
				if ($to) {
					$query->where(DB::raw('days.date + INTERVAL sessions.end_time HOUR_SECOND'), '<=', $to);
				}
			})
			->groupBy('events.id')
			->orderBy('days.date', 'ASC')
			->orderBy('sessions.start_time', 'ASC');

		// Add relations if requested
//        if (count($expand)) {
//            $eventQuery->with($expand);
//        }

//		echo $eventQuery->toSql();

		return response()->jsonAPI($eventQuery);
	}

	/**
	 * Get a single event
	 *
	 * @param int $id Event ID
	 * @return \Symfony\Component\HttpFoundation\Response Event
	 */
	public function getEvent($id)
	{
		return response()->jsonAPI(Event::find($id));
	}

	/**
	 * Create a new event
	 *
	 * @param Request $request Request
	 * @return \Symfony\Component\HttpFoundation\Response Event
	 */
	public function createEvent(Request $request)
	{
		$Event = Event::create($request->all());
		return response()->json($Event);
	}

	/**
	 * Update an event
	 *
	 * @param Request $request Request
	 * @param int $id Event ID
	 * @return \Symfony\Component\HttpFoundation\Response Event
	 */
	public function updateEvent(Request $request, $id)
	{
		$Event = Event::find($id);
		$Event->title = $request->input('title');
		$Event->author = $request->input('author');
		$Event->isbn = $request->input('isbn');
//		$Event->save();

		return response()->json($Event);
	}

	/**
	 * Delete an event
	 *
	 * @param int $id Event ID
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @todo Set the deleted property to 1 instead of really deleting the event
	 */
//	public function deleteEvent($id)
//	{
//		$Event = Event::find($id);
//		$Event->delete();
//
//		return response()->json('deleted');
//	}
}