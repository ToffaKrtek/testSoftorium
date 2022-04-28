FROM php:5.6-apache
RUN apt-get update && apt-get install -y \
        gettext \
        && docker-php-ext-install mbstring mysqli pdo pdo_mysql \
        gettext && a2enmod rewrite
