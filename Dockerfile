FROM quay.io/continuouspipe/drupal-php7-apache:stable

MAINTAINER "Kieren Evans <kieren.evans+drupal8-docker@inviqa.com>"

# Add the application
COPY . /app
WORKDIR /app

ARG GITHUB_TOKEN=
RUN container build
