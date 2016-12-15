FROM php:7.1-apache

# Installing curl and git to install dependencies later
RUN apt-get update && apt-get install -y curl && apt-get install -y git

# Installing memcached PHP extension
RUN apt-get update \
        && buildDeps=" \
                libmemcached-dev \
                zlib1g-dev \
        " \
        && doNotUninstall=" \
                libmemcached11 \
                libmemcachedutil2 \
        " \
        && apt-get install -y $buildDeps --no-install-recommends \
        && rm -r /var/lib/apt/lists/* \
        \
        && docker-php-source extract \
        && git clone --branch php7 https://github.com/php-memcached-dev/php-memcached /usr/src/php/ext/memcached/ \
        && docker-php-ext-install memcached \
        \
        && docker-php-source delete \
        && apt-mark manual $doNotUninstall \
        && apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false $buildDeps

# Install Composer and make it available in the PATH
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Installing pdo_mysql PHP extension
RUN docker-php-ext-install pdo pdo_mysql

# Customize php.ini configuration
COPY ./custom-php.ini /usr/local/etc/php/conf.d/
