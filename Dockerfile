FROM php:7.3-fpm

RUN apt-get update && \
    apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev && \
    apt-get install -y libpng-dev && \
    apt-get install -y libmcrypt-dev && \
    apt-get install -y default-mysql-client && \
    pecl install mcrypt-1.0.3 && \
    docker-php-ext-enable mcrypt && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install gd && \
    pecl install mongodb && \
    apt-get install -y libxslt-dev && \
    docker-php-ext-install xsl && \
    apt-get update && \
    apt-get install -y git && \
    apt-get install -y unzip && \
    apt-get install -y zip && \
    apt-get install -y libzip-dev && \
    docker-php-ext-install zip && \
    apt-get install -y libicu-dev && \
    docker-php-ext-install intl && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
    #&& \
    #apt-get install -y supervisor

ADD php.ini /usr/local/etc/php
#ADD laravel-event-listener.conf /etc/supervisor/conf.d

COPY . /var/www

WORKDIR /var/www

RUN curl -sL https://deb.nodesource.com/setup_14.x -o nodesource_setup.sh && \
    bash nodesource_setup.sh && \
    apt install nodejs -y


RUN chown -R www-data:www-data \
       /var/www/storage \
      /var/www/storage/* \
    /var/www/bootstrap/cache
    #\
    #&& chmod +x /var/www/start-supervisor.sh
