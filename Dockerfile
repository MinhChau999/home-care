FROM php:8.1-fpm-alpine
WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

# composer require nette/schema:^1.1.0

# Install npm
RUN apk update && apk add curl && \
    curl -fsSL https://deb.nodesource.com/setup_19.7 | sh && \
    apk add --no-cache nodejs && \
    apk add git && \
    apk add npm

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer self-update --2