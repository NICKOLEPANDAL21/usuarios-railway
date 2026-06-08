FROM php:8.2-apache

# Solución al error de duplicado de MPM
RUN a2dismod mpm_event && a2enmod mpm_prefork

RUN docker-php-ext-install mysqli
RUN a2enmod rewrite

COPY . /var/www/html/

EXPOSE 80
