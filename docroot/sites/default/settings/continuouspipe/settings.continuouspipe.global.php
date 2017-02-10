<?php

/**
 * @file
 *
 * Global settings for sites on Continuous Pipe.
 */

$databases['default']['default'] = array (
    'database' => getenv('DRUPAL_DATABASE_NAME'),
    'username' => getenv('DRUPAL_DATABASE_USERNAME'),
    'password' => getenv('DRUPAL_DATABASE_PASSWORD'),
    'prefix' => getenv('DRUPAL_DATABASE_PREFIX'),
    'host' => getenv('DRUPAL_DATABASE_HOST'),
    'port' => getenv('DRUPAL_DATABASE_PORT'),
    'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
    'driver' => 'mysql',
);
