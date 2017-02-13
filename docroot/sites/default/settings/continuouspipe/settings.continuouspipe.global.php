<?php

/**
 * @file
 *
 * Global settings for sites on Continuous Pipe.
 */

$databases['default']['default'] = array (
    'database' => $_ENV['DRUPAL_DATABASE_NAME'],
    'username' => $_ENV['DRUPAL_DATABASE_USERNAME'],
    'password' => $_ENV['DRUPAL_DATABASE_PASSWORD'],
    'prefix' => '',
    'host' => $_ENV['DRUPAL_DATABASE_HOST'],
    'port' => $_ENV['DRUPAL_DATABASE_PORT'],
    'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
    'driver' => 'mysql',
);
