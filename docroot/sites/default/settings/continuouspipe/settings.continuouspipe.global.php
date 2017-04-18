<?php

/**
 * @file
 *
 * Global settings for sites on Continuous Pipe.
 */

$databases['default']['default'] = [
    'database' => getenv('DATABASE_NAME'),
    'username' => getenv('DATABASE_USER'),
    'password' => getenv('DATABASE_PASSWORD'),
    'prefix' => '',
    'host' => getenv('DATABASE_HOST'),
    'port' => getenv('DATABASE_HOST_PORT'),
    'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
    'driver' => 'mysql',
];

$settings['hash_salt'] = getenv('DRUPAL_HASH_SALT');
