FROM composer:1.10.22

WORKDIR /var/www/app

ADD --chown=www-data:www-data . /var/www/app
