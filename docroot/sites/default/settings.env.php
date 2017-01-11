<?php
/*
 * Variables declared via environment variables go here!
 */
$settings['hash_salt'] = getenv('DRUPAL_HASH_SALT');
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
$config_directories['sync'] = 'sites/default/files/config_' . getenv('DRUPAL_CONFIG_DIRECTORY_SECRET') . '/sync';
