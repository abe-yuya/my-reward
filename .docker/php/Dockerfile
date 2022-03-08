FROM php:7.4-fpm-buster

COPY php.ini /usr/local/etc/php/php.ini
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN curl -sL https://deb.nodesource.com/setup_current.x | bash -
RUN apt install -y nodejs

RUN install-php-extensions \
    pdo_mysql \
    bcmath \
    mbstring \
    zip \
    opcache \
    gd \
    intl \
    redis \
    xdebug

WORKDIR /app

CMD "php-fpm"
