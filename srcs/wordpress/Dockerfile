FROM alpine:3.12
RUN apk update && apk upgrade && apk add php7 php7-fpm php7-session php7-json php7-mysqli php7-xml php7-curl php7-iconv php7-phar php7-redis php7-ctype
ADD https://wordpress.org/latest.tar.gz /var/www/data/
RUN cd /var/www/data/ && tar -xf latest.tar.gz && rm -rf latest.tar.gz
COPY wp-config.php /var/www/data/wordpress/
COPY www.conf /etc/php7/php-fpm.d/
COPY ./start.sh /

#REDIS
COPY ./object-cache.php /var/www/data/wordpress/wp-content

ENTRYPOINT ["sh", "start.sh"]
