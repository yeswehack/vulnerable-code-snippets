#PHP Apache setup
FROM php:8.2-apache

#Install and update system dependencies
RUN apt update -y; apt install -y supervisor apache2

#Prepare and setup the working directory
WORKDIR /var/www/html/
COPY vsnippet .
RUN mkdir tmp

#Copy configs
COPY config/supervisord.conf /etc/supervisord.conf
COPY config/php-custom.ini /usr/local/etc/php/conf.d
COPY config/apache.conf /etc/apache2/sites-enabled/apache.conf

#Give permission:
RUN chown -R www-data /var/www/html/

EXPOSE 1337

ENTRYPOINT [ "/usr/bin/supervisord", "-c", "/etc/supervisord.conf" ]
