# Imagen oficial de WordPress con Apache y PHP 8.2
FROM wordpress:php8.2-apache

# Copiamos todo el contenido de WordPress al contenedor
COPY . /var/www/html

# Damos permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html