<?php

/**
 * @file
 *
 * Settings that are specific for Acquia.
 *
 * This file just includes the global settings file, and any settings files
 * that exist based on the current environment. This is set by Acquia.
 */

$acquia_environment = FALSE;

if (isset($_ENV['AH_SITE_ENVIRONMENT'])) {
  $acquia_environment = $_ENV['AH_SITE_ENVIRONMENT'];
}

// If we don't have an Acquia environment, then just leave.
if ($acquia_environment === FALSE) {
  return;
}

$global_settings_file = __DIR__ . '/acquia/settings.acquia.global.php';

// Load in the global settings file if it exists.
if (file_exists($global_settings_file)) {
  include $global_settings_file;
}

// Load in any available environment specific settings files if they exist.
// These are loaded in afterwards to give specific environments the
// opportunity to override any settings that may be defined in the global
// file.
$environment_settings_file = __DIR__ . '/acquia/settings.acquia.' . $acquia_environment . '.php';

if (file_exists($environment_settings_file)) {
  include $environment_settings_file;
}
