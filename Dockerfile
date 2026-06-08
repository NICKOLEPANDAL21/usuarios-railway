FROM php:8.2-apache

# Instalamos las extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

COPY . /var/www/html/

EXPOSE 80
