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

namespace Auth\Service;

use Auth\Entity\User;
use Zend\Crypt\Password\Bcrypt;

class UserService
{
    /**
     * Static function for checking hashed password (as required by Doctrine)
     *
     * @param \Auth\Entity\User $user The identity object
     * @param \string $passwordGiven  Password provided to be verified
     *
     * @return \boolean                            TRUE if the password was correct, else returns FALSE
     */
    public static function verifyHashedPassword(User $user, $passwordGiven)
    {
        $bcrypt = new Bcrypt(array('cost' => 10));

        return $bcrypt->verify($passwordGiven, $user->getPassword());
    }

    /**
     * Encrypt Password
     *
     * Creates a Bcrypt password hash
     *
     * @return String
     */
    public static function encryptPassword($password)
    {
        $bcrypt = new Bcrypt(array('cost' => 10));

        return $bcrypt->create($password);
    }
}
