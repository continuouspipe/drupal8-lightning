FROM quay.io/inviqa_images/drupal8-apache:7.0

MAINTAINER "Kieren Evans <kevans@inviqa.com>"

# USER build

# Add the application
COPY . /app
WORKDIR /app

RUN mkdir -p /app/docroot/sites/default/ \
 && cp /app/tools/docker/config/settings.php /app/docroot/sites/default/

# Install dependencies
ARG GITHUB_TOKEN=
RUN if [ -n "$GITHUB_TOKEN" ]; then \
        sh /usr/local/share/drupal8/install.sh; \
    fi


    # cp /app/docroot/sites/default/default.services.yml /app/docroot/sites/default/services.yml
    # cp /app/tools/docker/config/settings.php /app/docroot/sites/default/
    # mysqldump -h database -u drupal -p drupaldb  > /app/tools/assets/development/drupaldb.sql
    # gzip /app/tools/assets/development/drupaldb.sql

#        app/console assets:install --symlink --no-debug && \
#        app/console assetic:dump --env=dev && \
#        composer clear-cache && \
#        ((rm -Rf app/cache/* && rm -Rf app/logs/*) || true) \
