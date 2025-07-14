FROM php:8.2-apache

# Install mysqli
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql mysqli
# Copy PHP files to Apache root
COPY . /var/www/html/
COPY php.ini /usr/local/etc/php/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

