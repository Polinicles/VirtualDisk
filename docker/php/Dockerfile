# Use oficial PHP with fpm.
FROM php:7.2.10-fpm

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

# Copy source code and the docker environment
COPY ./app/ /opt/app

# Set working directory
WORKDIR /opt/app/

# Install dependencies
RUN composer install --no-interaction \
    && composer clear-cache
