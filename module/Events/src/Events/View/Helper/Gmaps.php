<?php

namespace Events\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Gmaps extends AbstractHelper {
	/**
	 * Default parameters
	 * 
	 * @var \array
	 */
	protected static $_defaultParams = array(
		'zoom' => 14,
		'sensor' => false,
	);
	/**
	 * Default static Google Maps API
	 * 
	 * @var \string
	 */
	const GMAPS_URI = 'http://maps.googleapis.com/maps/api/staticmap';
	
	public function __invoke(array $address = array(), $latitude = null, $longitude = null, $width = 600, $height = 300) {
		if (count($address) || (floatval($latitude) && floatval($longitude))) {
			$address			= implode(',', $address);
			$params				= self::$_defaultParams;
			$params['size']		= max(100, intval($width)).'x'.max(100, intval($height));
			$params['center']	= (floatval($latitude) && floatval($longitude)) ? "$latitude,$longitude" : $address;
			$params['markers']	= implode('|', array('label:A', $params['center']));
			$gmapsUri			= self::GMAPS_URI.'?'.http_build_query($params);
			return '<img src="'.htmlspecialchars($gmapsUri).'"/>';
		} else {
			return '---';
		}
	}
}