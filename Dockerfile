FROM quay.io/inviqa_images/drupal8-apache:7.0

MAINTAINER "Kieren Evans <kevans@inviqa.com>"

USER build

# Add the application
COPY . /app
WORKDIR /app

USER root

RUN mkdir -p /app/docroot/sites/default/ \
 && cp /app/tools/docker/config/settings.php /app/docroot/sites/default/ \
 && chown -R build:build /app \
 && cp -R /app/tools/docker/usr/ /usr

USER build

# Install dependencies
ARG GITHUB_TOKEN=
RUN if [ -n "$GITHUB_TOKEN" ]; then \
      composer install --no-interaction --optimize-autoloader \
      && composer clear-cache; \
    fi

USER root
