FROM dunglas/frankenphp:1.3.2-php8.3 AS php

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions @composer pdo opcache apcu redis pdo_pgsql

COPY app/ /app

COPY app-config/php/php.prod.ini $PHP_INI_DIR/php.ini
COPY app-config/caddy/prod.Caddyfile /etc/caddy/Caddyfile

RUN chown www-data:www-data /app
USER www-data
WORKDIR /app

ENV APP_RUNTIME="Runtime\\FrankenPhpSymfony\\Runtime"
