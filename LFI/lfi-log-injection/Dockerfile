#PHP Apache setup
FROM php:7.2-apache

#Install and update system dependencies
RUN apt update -y; apt install -y supervisor apache2

#Prepare and setup the working directory
WORKDIR /var/www/html/
COPY vsnippet .

#Copy configs
COPY config/supervisord.conf /etc/supervisord.conf
COPY config/apache.conf /etc/apache2/sites-enabled/apache.conf

#Give permission:
RUN chown -R www-data /var/www/html/

EXPOSE 1337

ENTRYPOINT [ "/usr/bin/supervisord", "-c", "/etc/supervisord.conf" ]
