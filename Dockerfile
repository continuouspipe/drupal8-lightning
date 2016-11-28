FROM quay.io/continuouspipe/drupal8-apache:7.0_v1

MAINTAINER "Kieren Evans <kieren.evans+drupal8-docker@inviqa.com>"

USER build

# Add the application
COPY . /app
WORKDIR /app

USER root

RUN mkdir -p /app/docroot/sites/default/files/ \
 && chown -R build:build /app \
 && cp -R /app/tools/docker/usr/ /usr

# Install dependencies
ARG GITHUB_TOKEN=
RUN bash /usr/local/share/drupal8/install.sh
