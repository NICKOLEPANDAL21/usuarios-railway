FROM php:8.2-apache

# Forzamos la desactivación de mpm_event borrando su archivo de configuración
RUN rm -f /etc/apache2/mods-enabled/mpm_event.load /etc/apache2/mods-enabled/mpm_event.conf

# Aseguramos que mpm_prefork (el correcto para PHP) esté activo
RUN a2enmod mpm_prefork

# Instalamos todas las extensiones de bases de datos por si acaso
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

COPY . /var/www/html/

EXPOSE 80
