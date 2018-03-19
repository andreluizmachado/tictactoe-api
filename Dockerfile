FROM composer as builder

WORKDIR /var/www/html

COPY composer.* ./

RUN composer install --no-scripts --ignore-platform-reqs --no-dev

COPY app ./app
COPY bootstrap ./bootstrap
COPY public ./public
COPY routes ./routes
COPY storage ./storage

RUN rm composer.json composer.lock

FROM php:7.2-fpm-alpine3.7

WORKDIR /var/www/html

COPY --from=builder /var/www/html .

RUN chmod -R 0777 storage/