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

namespace API\V1\Mapper;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Abstract entity mapper base class
 * 
 * @author		Joschi Kuphal <joschi@kuphal.net>
 */
abstract class AbstractMapper {
	/**
	 * Repository of this mapper
	 *
	 * @var \string
	 */
	protected $repository;
	/**
	 * Entity manager
	 * 
	 * @var \Doctrine\ORM\EntityManager
	 */
	protected $entityManager;
	/**
	 * Service locator
	 * 
	 * @var Zend\ServiceManager\ServiceLocator
	 */
	protected static $_serviceLocator;
	/**
	 * Twitter base URL
	 * 
	 * @var \string
	 */
	const TWITTER_URL = 'https://twitter.com/';
	/**
	 * Facebook base URL
	 * 
	 * @var \string
	 */
	const FACEBOOK_URL = 'https://facebook.com/';
	/**
	 * Xing base URL
	 * 
	 * @var \string
	 */
	const XING_URL = 'https://xing.com/';
	
	/**
	 * Constructor
	 * 
	 * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator		Service locator
	 */
	public function __construct(ServiceLocatorInterface $serviceLocator) {
		self::$_serviceLocator = $serviceLocator;
	}
	
	/**
	 * Return the entity manager
	 *
	 * @return EntityManager
	 */
	protected function getEntityManager() {
		if (null === $this->entityManager) {
			$this->entityManager = self::$_serviceLocator->get('doctrine.entitymanager.orm_default');
		}
	
		return $this->entityManager;
	}

	/**
	 * Fetch a single entity
	 *
	 * @param \int $id						Entity ID
	 * @param \boolean $dereference			Dereference external entities
	 * @return Ambigous <NULL, array, multitype:NULL Ambigous <NULL, array, multitype:Ambigous <\Events\Entity\the, integer> Ambigous <\Events\Entity\the, string> > >
	 */
	public function fetch($id, $dereference = false) {
		$event				= $this->getEntityManager()->getRepository($this->repository)->findOneBy(array('id' => $id));
		return ($event instanceof \Events\Entity\AbstractEntity) ? static::map($event, $dereference) : null;
	}
	
	/**
	 * Fetch all or a subset of entities
	 * 
	 * @param \ArrayObject|\array $params					REST parameters
	 * @param \int $offset									Page offset
	 * @param \int $itemCountPerPage						Items per page
	 * @return \array										Items
	 */
	public function fetchAll($params = array()) {
		$entities			= array();
		if (isset($params['flat'])) {
			$dereference	= (boolean)$params['flat'];
			unset($params['flat']);
		} else {
			$dereference	= false;
		}
	
		foreach ($this->getEntityManager()->getRepository($this->repository)->findBy((array)$params) as $entity) {
			$entities[]		= static::map($entity, $dereference);
		}
		
		return $entities;
	}
	
	/**
	 * Count all or a subset of entities
	 * 
	 * @param \ArrayObject|\array $params					REST parameters
	 * @return \int											Number of items
	 */
	public function countAll($params = array()) {
		return $this->getEntityManager()->getRepository($this->repository)->countBy($params);
	}
	
	/**
	 * Format and return an URL
	 * 
	 * @param \string $url									Raw URL
	 * @param \string $prefix								Prefix
	 * @return \string										Formatted URL
	 * @return void
	 */
	public static function url($url, $prefix = '') {
		$url 				= trim($url);
		if (strlen($url)) {
			$url			= $prefix.$url;
			return (strncmp('http', $url, 4) ? 'https://' : '').$url;
		} else {
			return null;
		}
	}
	
	/**
	 * Format and return a list of hashtags
	 * 
	 * @param \mixed $hashtags								Hashtags
	 * @return \array										Formatted hashtags
	 */
	public static function hashtags($hashtags) {
		if (!is_array($hashtags)) {
			$hashtags			= preg_split('%\s+%', trim($hashtags));
		}
		$result					= array();
		foreach ($hashtags as $hashtag) {
			$hashtag			= ltrim(trim($hashtag), '#');
			if (strlen($hashtag)) {
				$result[]		= '#'.$hashtag;
			}
		}
		return $result;
	}
	
	/**
	 * Convert a markdown string to HTML
	 * 
	 * @param \string $markdown								String
	 * @return \string										HTML
	 */
	public static function markdown($markdown) {
		return self::$_serviceLocator->get('MaglMarkdown\MarkdownService')->render($markdown);
	}
	
	/**
	 * Substitute empty strings with NULL
	 * 
	 * @param \string $str									String
	 * @return \string|NULL									Non-empty string or NULL
	 */
	public static function emptyValue($str) {
		$str					= trim($str);
		return strlen($str) ? $str : null;
	}
	
	/**
	 * Return an absolute image URL
	 * 
	 * @param \string $image								URL
	 * @return \string										Absolute URL
	 */
	public static function image($image) {
		$image					= ltrim(trim($image), '/');
		if (strlen($image)) {
			$schema				= empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
			$host				= $_SERVER['HTTP_HOST'];
			$port				= (!(empty($_SERVER['SERVER_PORT'])) && ($_SERVER['SERVER_PORT'] != (empty($_SERVER['HTTPS']) ? '80' : '443'))) ? ':'.$_SERVER['SERVER_PORT'] : '';
			$image				= preg_replace("%^(\.\/)*%", '', $image);
			return $schema.$host.$port.'/'.$image;
		} else {
			return null;
		}
	}
	
	/**
	 * Substitute an empty floating point number with NULL
	 * 
	 * @param \float $float									Floating point number
	 * @return \float|NULL									Substituted floating point number
	 */
	public static function float($float) {
		return (strlen($float) && (floatval($float) != 0)) ? floatval($float) : null;
	}
}