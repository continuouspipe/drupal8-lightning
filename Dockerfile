FROM quay.io/inviqa_images/drupal8-apache:7.0

MAINTAINER "Kieren Evans <kevans@inviqa.com>"

# Add the application
COPY . /app
WORKDIR /app

RUN mkdir -p /app/docroot/sites/default/ \
 && cp /app/tools/docker/config/settings.php /app/docroot/sites/default/

COPY ./tools/docker/usr/ /usr

# Install dependencies
ARG GITHUB_TOKEN=
RUN if [ -n "$GITHUB_TOKEN" ]; then \
      composer install --no-interaction --optimize-autoloader \
      && composer clear-cache; \
    fi

CMD ["/app/tools/docker/start.sh"]
