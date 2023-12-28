FROM php:8.2-fpm-alpine

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk --update --no-cache add \
    curl \
    libzip-dev \
    libpng-dev \
    autoconf \
    gcc \
    g++ \
    make \
    git \
    bash \
    icu-dev \
    oniguruma-dev \
    nodejs \
    npm \
    patch && \
    rm -rf /var/cache/apk/* && \
    # Install PHP Extension
    docker-php-ext-install \
    pdo_mysql \
    bcmath \
    mbstring \
    zip \
    opcache \
    gd \
    intl

WORKDIR /var/www/app