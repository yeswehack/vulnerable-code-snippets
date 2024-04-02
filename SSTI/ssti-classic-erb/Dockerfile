FROM ruby:3

#Install and update system dependencies
RUN apt update -y; apt install -y supervisor
RUN gem install webrick erb

#Prepare and setup the working directory
RUN mkdir -p /app
WORKDIR /app
COPY vsnippet .
COPY config/supervisord.conf /etc/supervisord.conf

EXPOSE 1337

ENTRYPOINT [ "/usr/bin/supervisord", "-c", "/etc/supervisord.conf" ]
