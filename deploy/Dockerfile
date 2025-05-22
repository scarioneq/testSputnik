FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    postgresql-dev \
    git \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql bcmath \
    && docker-php-ext-enable bcmath

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY backend/composer.json backend/composer.lock ./

RUN composer install --prefer-dist --no-progress --optimize-autoloader --no-scripts

COPY backend/ .

RUN composer run-script post-autoload-dump

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache \
    && mkdir -p /var/www/storage/logs \
    && mkdir -p /var/www/storage/framework/{cache,sessions,testing,views} \
    && chmod -R 777 /var/www/storage

CMD ["sh", "-c", "php-fpm"]