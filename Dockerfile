FROM php:8.2-apache

# Install dependencies for required PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    libxslt1-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql intl soap bcmath xsl zip sockets \
    && a2enmod rewrite

# Copy the custom php.ini configuration
COPY php.ini /usr/local/etc/php/conf.d/