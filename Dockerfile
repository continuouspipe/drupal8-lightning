FROM quay.io/continuouspipe/php5.6-apache:stable

MAINTAINER "Kieren Evans <kieren.evans+drupal7-docker@inviqa.com>"

USER build

RUN a2enmod rewrite

# Add the application
COPY . /app
WORKDIR /app

USER root

RUN mkdir -p /app/docroot/sites/default/files/ \
 && chown -R build:build /app \
 && cp -R /app/tools/docker/usr/* /usr \
 && chown -R www-data:www-data /app/docroot/sites

# Install dependencies
ARG GITHUB_TOKEN=
ARG CODE_OWNER=build
ARG CODE_GROUP=build
ARG APP_GROUP=www-data
RUN bash /usr/local/share/drupal7/install.sh
