FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

CMD sh -c "php -S 0.0.0.0:${PORT:-8080}"