FROM wordpress:5.3.2-php7.3-apache

RUN apt-get update && apt-get install -y git