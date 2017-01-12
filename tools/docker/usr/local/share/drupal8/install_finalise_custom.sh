#!/bin/bash

cd /app

# Install any new dependencies
composer install --no-interaction --optimize-autoloader

cd /app/docroot

# Wait for a database.
while ! mysqladmin ping -h ${DRUPAL_DATABASE_HOST} -P ${DRUPAL_DATABASE_PORT} -u ${DRUPAL_DATABASE_USERNAME} -p${DRUPAL_DATABASE_PASSWORD} --silent; do
    echo "Couldn't establish database connection. Trying again in 5 seconds..."
    sleep 5
done;

# Check if Drupal is installed and act accordingly.
if ! drush status bootstrap | grep -q Successful ; then
    # Drupal is not installed.
    drush si thunder -y
    mkdir -p sites/default/files
    drush cache-rebuild
fi

