FROM php:8.2-cli

# Instalamos las extensiones para tu base de datos
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiamos tus archivos al contenedor
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

EXPOSE 80

# Comando nativo de arranque directo
CMD [ "php", "-S", "0.0.0.0:80" ]
