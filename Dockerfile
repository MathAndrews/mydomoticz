FROM php:5.6-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Nodesource script, apt-get update already launched here
RUN curl -sL https://deb.nodesource.com/setup_7.x | bash -

# Install Packages
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        mysql-client \
        git \
        zip \
        nodejs \
        libicu-dev \
        g++ \
    && docker-php-ext-install -j$(nproc) iconv mcrypt pdo pdo_mysql mysql intl \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# Set the timezone.
RUN echo "Europe/Zurich" > /etc/timezone \
  && dpkg-reconfigure -f noninteractive tzdata

# Set custom bashrc
COPY .bashrc /root/.bashrc

# Github authentification file for composer
#COPY app/auth.json /root/.composer/

## Install Composer.
#RUN curl -sS https://getcomposer.org/installer | php \
#    && mv composer.phar /usr/local/bin/composer \
#    && composer global require "fxp/composer-asset-plugin:~1.3.0"
#
## Composer install
#WORKDIR /var/www/html/
#COPY app/composer.json /var/www/html/
#RUN composer install --no-interaction --no-progress --prefer-dist --no-dev

# Set custom PHP configuration
COPY php.ini /usr/local/etc/php/php.ini

# Set custom PHP configuration
#COPY docker-php-entrypoint /usr/local/bin/docker-php-entrypoint

# Install theme dependencies for backend
#WORKDIR /var/www/html/backend/web/
#COPY app/backend/web/package.json app/backend/web/Gruntfile.js /var/www/html/backend/web/
#RUN npm install --production

# Set custom PHP configuration
#COPY docker-php-entrypoint /usr/local/bin/docker-php-entrypoint

# Copy application source folder
COPY app/ /var/www/html/

# Build theme for backend
#WORKDIR /var/www/html/backend/web/
#RUN npm run build

WORKDIR /var/www/html/