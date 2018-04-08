<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'defaults' => array(
        'country' => 276,
    ),

    'required' => array(
        'venue' => array(
            'street_address_1' => true,
            'postal_code'      => true,
            'locality'         => true,
        )
    ),

    // Apigility
    'db'       => array(
        'adapters' => array(
            'DB\\Events' => array(),
        ),
    ),
);
