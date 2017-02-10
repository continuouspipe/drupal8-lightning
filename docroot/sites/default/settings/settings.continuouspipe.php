<?php

/**
 * @file
 *
 * Settings that are specific for Continuous Pipe.
 *
 * This file just includes the global settings file, and any settings files
 * that exist based on the current environment. This environment variable is
 * defined in the continuous-pipe.yml settings file in the repository root.
 */

$cp_environment = FALSE;

if (isset($_ENV['CP_ENVIRONMENT'])) {
  $cp_environment = $_ENV['CP_ENVIRONMENT'];
}

// If we don't have a CP environment, then just leave.
if ($cp_environment === FALSE) {
  return;
}

$global_settings_file = __DIR__ . '/continuouspipe/settings.continuouspipe.global.php';

// Load in the global settings file if it exists.
if (file_exists($global_settings_file)) {
  include $global_settings_file;
}

// Load in any available environment specific settings files if they exist.
// These are loaded in afterwards to give specific environments the
// opportunity to override any settings that may be defined in the global
// file.
$environment_settings_file = __DIR__ . '/continuouspipe/settings.continuouspipe.' . $cp_environment . '.php';

if (file_exists($environment_settings_file)) {
  include $environment_settings_file;
}
