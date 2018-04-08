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
 * Image trait
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
trait Image
{
    /**
     * Image
     *
     * @var \string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $image;

    /**
     * @return the $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param \string|\array $image Image
     */
    public function setImage($image)
    {
        if (is_array($image)) {
            if (array_key_exists('tmp_name', $image) && strlen($image['tmp_name'])) {
                $image = $image['tmp_name'];
            } else {
                return;
            }
        }

        $this->image = $image;
    }

    /**
     * Delete the image
     *
     * @return \void
     */
    public function deleteImage()
    {
        if (strlen($this->image)) {
            $image = strncmp('/img/', $this->image, 5) ? './data/tmp/'.$this->image : './public'.$this->image;
            if (@is_file($image)) {
                @unlink($image);
                $this->image = '';
            }
        }
    }

    /**
     * Persist a temporary image
     *
     * @param \string $type Image type
     *
     * @return \boolean                        Success
     */
    protected function _persistImage($type)
    {
        if (strlen($this->image) && strncmp($this->image, '/img/'.$type, strlen($type) + 5)) {
            $tmpFile = $this->image;
            $appPath = dirname(dirname(dirname(dirname(dirname(__DIR__)))));
            if (!@is_file($tmpFile)) {
                $tmpFile = $appPath.'/public/img/_temp/'.$tmpFile;
            }
            if (@is_file($tmpFile)) {
                $imageDirectory = '/img/'.$type;

                if (@is_dir($appPath.'/public'.$imageDirectory) || (mkdir($appPath.'/public'.$imageDirectory) && chmod($appPath.'/public'.$imageDirectory,
                            0777))) {
                    $image = $imageDirectory.'/'.$type.'-'.$this->getId().'.'.pathinfo($this->image,
                            PATHINFO_EXTENSION);
                    if ((!@is_file($appPath.'/public'.$image) || @unlink($appPath.'/public'.$image)) && rename($tmpFile,
                            $appPath.'/public'.$image)) {
                        $this->image = $image;

                        return true;
                    }
                }
            }
        }

        return false;
    }
}