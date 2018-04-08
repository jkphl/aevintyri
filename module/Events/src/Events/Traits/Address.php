<?php

/**
 * Event management
 *
 * @category       Tollwerk
 * @package        Tollwerk_Events
 * @author         Joschi Kuphal <joschi@kuphal.net>
 * @copyright      Copyright © 2014 tollwerk GmbH <info@tollwerk.de>
 * @license        http://opensource.org/licenses/BSD-3-Clause	The BSD 3-Clause License
 */

namespace Events\Traits;

/**
 * Address trait
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
trait Address
{
    /**
     * Street address 1
     *
     * @var \string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $street_address_1;
    /**
     * Street address 2
     *
     * @var \string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $street_address_2;
    /**
     * c/o
     *
     * @var \string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $co;
    /**
     * Postbox
     *
     * @var \string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $postbox;
    /**
     * Postal code
     *
     * @var \string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $postal_code;
    /**
     * Locality
     *
     * @var \string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $locality;
    /**
     * Region
     *
     * @var \string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $region;
    /**
     * Country
     *
     * @var \Events\Entity\Country
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumn(name="country", referencedColumnName="id", nullable=false)
     */
    protected $country;
    /**
     * Latitude
     *
     * @var \float
     * @ORM\Column(type="float", nullable=true)
     */
    protected $latitude;
    /**
     * Longitude
     *
     * @var \float
     * @ORM\Column(type="float", nullable=true)
     */
    protected $longitude;

    /**
     * @return the $region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param field_type $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return the $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param field_type $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return the $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param field_type $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Return the full address
     *
     * @return \address            Full address
     */
    public function getAddress()
    {
        $address = array();

        if (strlen($this->getCo())) {
            $address['co'] = $this->getCo();
        }
        if (strlen($this->getPostbox())) {
            $address['postbox'] = $this->getPostbox();
        } else {
            if (strlen($this->getStreet_address_1())) {
                $address['street_address_1'] = $this->getStreet_address_1();
            }
            if (strlen($this->getStreet_address_2())) {
                $address['street_address_2'] = $this->getStreet_address_2();
            }
        }
        $postalCodeLocality = array();
        if (strlen($this->getPostal_code())) {
            $postalCodeLocality['postal_code'] = $this->getPostal_code();
        }
        if (strlen($this->getLocality())) {
            $postalCodeLocality['locality'] = $this->getLocality();
        }
        if (count($postalCodeLocality)) {
            $address['postal_code_locality'] = implode(' ', $postalCodeLocality);
        }
        if ($this->getCountry() instanceof \Events\Entity\Country) {
            $address['country'] = $this->getCountry()->getName();
        }

        return $address;
    }

    /**
     * @return the $co
     */
    public function getCo()
    {
        return $this->co;
    }

    /**
     * @param field_type $co
     */
    public function setCo($co)
    {
        $this->co = $co;
    }

    /**
     * @return the $postbox
     */
    public function getPostbox()
    {
        return $this->postbox;
    }

    /**
     * @param field_type $postbox
     */
    public function setPostbox($postbox)
    {
        $this->postbox = $postbox;
    }

    /**
     * @return the $street_address_1
     */
    public function getStreet_address_1()
    {
        return $this->street_address_1;
    }

    /**
     * @param field_type $street_address_1
     */
    public function setStreet_address_1($street_address_1)
    {
        $this->street_address_1 = $street_address_1;
    }

    /**
     * @return the $street_address_2
     */
    public function getStreet_address_2()
    {
        return $this->street_address_2;
    }

    /**
     * @param field_type $street_address_2
     */
    public function setStreet_address_2($street_address_2)
    {
        $this->street_address_2 = $street_address_2;
    }

    /**
     * @return the $postal_code
     */
    public function getPostal_code()
    {
        return $this->postal_code;
    }

    /**
     * @param field_type $postal_code
     */
    public function setPostal_code($postal_code)
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @return the $locality
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param field_type $locality
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;
    }

    /**
     * @return field_type Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param field_type $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
}