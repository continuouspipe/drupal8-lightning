<?php

/**
 * @file
 *
 * Global settings for sites on Acquia
 */

// Include the settings required for Acquia database access etc.
$acquia_subscription_name = '';

if (file_exists('/var/www/site-php') && !empty($acquia_subscription_name)) {
  include '/var/www/site-php/' . $acquia_subscription_name . '/' . $acquia_subscription_name . '-settings.inc';
}

// This needs redeclaring here. Because Acquia.
$config_directories['sync'] = '../config/sync';
