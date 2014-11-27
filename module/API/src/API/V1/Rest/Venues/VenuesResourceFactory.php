<?php

/**
 * Event management
 *
 * @category	Tollwerk
 * @package		Tollwerk_Events
 * @author		Joschi Kuphal <joschi@kuphal.net>
 * @copyright	Copyright © 2014 tollwerk GmbH <info@tollwerk.de>
 * @license		http://opensource.org/licenses/BSD-3-Clause	The BSD 3-Clause License
 */
namespace API\V1\Rest\Venues;

class VenuesResourceFactory {
	public function __invoke($services) {
		return new VenuesResource($services->get('v1.mapper.venues'));
	}
}
