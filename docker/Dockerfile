FROM ghcr.io/immediatemediaco/php:8.1-composer-tests

ARG COMPOSER_AUTH

RUN echo "$COMPOSER_AUTH" >> /root/.composer/auth.json

COPY . /home/www-data/app

WORKDIR /home/www-data/app
