##----------------OLD DOCKERFILE CONFIG-----------------------##
# FROM php:8.2-fpm-alpine

# WORKDIR /var/www/html

# # Install necessary packages
# RUN apk add --no-cache \
#     freetype \
#     libjpeg-turbo \
#     libpng \
#     libzip \
#     mysql-client \
#     && docker-php-ext-install pdo pdo_mysql

# # Install Composer globally
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Set correct permissions for Composer
# RUN chmod +x /usr/local/bin/composer

# # Copy the application code
# COPY . .

# # Install dependencies
# # Install Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Expose the PHP-FPM port
# EXPOSE 9000

# # Start the PHP-FPM process
# CMD ["php-fpm"]
##----------------------NEW DOCKERFILE CONFIG-------------------------##
FROM php:8.2 as laravel-app

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis


WORKDIR /var/www
COPY . .

COPY --from=composer:2.8.3 /usr/bin/composer /usr/bin/composer

ENV PORT=8000

ENTRYPOINT [ "./entrypoint.sh" ]