FROM quay.io/continuouspipe/drupal8-apache-php7:dev

MAINTAINER "Kieren Evans <kieren.evans+drupal8-docker@inviqa.com>"

# Add the application
COPY . /app
WORKDIR /app

COPY ./tools/docker/usr/ /usr

ARG GITHUB_TOKEN=
ARG CODE_OWNER=build
ARG CODE_GROUP=build
ARG APP_USER=www-data
ARG APP_GROUP=www-data

RUN container build
