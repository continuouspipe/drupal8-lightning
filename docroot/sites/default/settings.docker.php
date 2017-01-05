<?php

/**
 * @file
 * Docker/CP specific files.
 */
// We could probably check for all the vars here. Maybe we should?
if (getenv('DRUPAL_DATABASE_NAME') !== FALSE) {

  $databases['default']['default'] = array(
    'database' => getenv('DRUPAL_DATABASE_NAME'),
    'username' => getenv('DRUPAL_DATABASE_USERNAME'),
    'password' => getenv('DRUPAL_DATABASE_PASSWORD'),
    'prefix' => '',
    'host' => getenv('DRUPAL_DATABASE_HOST'),
    'port' => getenv('DRUPAL_DATABASE_PORT'),
    'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
    'driver' => 'mysql',
  );

}

$settings['container_yamls'][] = __DIR__ . '/docker.services.yml';
