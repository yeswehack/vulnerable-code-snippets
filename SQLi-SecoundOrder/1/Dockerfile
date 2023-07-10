#PHP Apache setup
FROM php:8.2-apache

#Update and install needed packages:
RUN apt-get update \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli
