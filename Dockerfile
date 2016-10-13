FROM php:5.6-apache
EXPOSE 80

COPY php.ini /usr/local/etc/php/
COPY conf.d/* /usr/local/etc/php/conf.d/

RUN docker-php-ext-install mysql mysqli

WORKDIR /var/www/html
COPY . /var/www/html

RUN chmod 777 -R /var/
RUN chmod 777 -R /var/www/
RUN chmod 777 -R /var/www/html/
RUN chmod 777 -R dbfile/

RUN chmod a+x .shipped/build  .shipped/test

RUN [".shipped/build"]

