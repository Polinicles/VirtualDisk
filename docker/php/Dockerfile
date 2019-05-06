FROM php:7.2-fpm

# Set working directory
WORKDIR /opt/app/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer && chmod +sx /usr/local/bin/composer
