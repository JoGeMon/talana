FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
git unzip libzip-dev libpng-dev libicu-dev\
&& docker-php-ext-install mysqli pdo pdo_mysql zip \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl \
&& a2enmod rewrite

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY . /var/www/html

WORKDIR /var/www/html

EXPOSE 80