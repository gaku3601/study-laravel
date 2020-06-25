FROM php:7.3-apache

COPY php.ini /usr/local/etc/php/
COPY *.conf /etc/apache2/sites-enabled/

RUN apt-get update \
  && apt-get install -y libzip-dev zlib1g-dev mariadb-client \
  && docker-php-ext-install zip pdo_mysql
RUN apt-get install -y nodejs
RUN apt-get install -y npm
RUN apt-get install -y cron

#Composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin


WORKDIR /var/www/html

RUN composer global require "laravel/installer"

# laravelでschedulerを実行するために必要なcronを登録
COPY crontab /etc/cron.d/laravel-cron
RUN chmod 0644 /etc/cron.d/laravel-cron
RUN crontab /etc/cron.d/laravel-cron
RUN touch /var/log/cron.log

CMD service cron start && apache2-foreground && docker-php-entrypoint