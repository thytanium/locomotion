FROM php:7.3-fpm

WORKDIR /app

RUN apt-get update && apt-get install -y unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN pecl install xdebug && docker-php-ext-enable xdebug
