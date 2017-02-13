#!/bin/bash

# Give the webroot to the app user.
chown -R ${APP_USER}:${APP_GROUP} /app/docroot

# Make settings file/directory writeable to allow install through the UI.
# Drupal will secure this later.
chmod ug+x /app/docroot/sites/default