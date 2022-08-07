FROM php:8.1-fpm
WORKDIR /var/www/app

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

ADD . /var/www/app
RUN chown -R www-data:www-data /var/www/app

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


