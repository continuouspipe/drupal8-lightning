FROM quay.io/continuouspipe/drupal8-apache:7.0_v1

MAINTAINER "Kieren Evans <kieren.evans+drupal8-docker@inviqa.com>"

USER build

# Add the application
COPY . /app
WORKDIR /app

USER root

RUN mkdir -p /app/docroot/sites/default/files/ \
 && cp /app/tools/docker/config/* /app/docroot/sites/default/ \
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
