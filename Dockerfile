FROM php:8.2-apache

# Solución al error de duplicado de MPM
RUN a2dismod mpm_event && a2enmod mpm_prefork

# Instalamos AMBAS extensiones para asegurar compatibilidad total con tu código
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

COPY . /var/www/html/

EXPOSE 80
