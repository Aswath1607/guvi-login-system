FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

RUN a2enmod rewrite

COPY . /var/www/html/

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

EXPOSE 80