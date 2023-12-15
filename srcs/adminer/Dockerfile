FROM debian:buster
RUN apt-get update && apt-get upgrade && apt-get install -y wget php libapache2-mod-php php-curl php-cli php-mysql php-gd php-fpm
RUN mkdir /var/www/wordpress/
RUN mkdir -p /run/php/
COPY adminer.php /
COPY start.sh /
ENTRYPOINT ["sh", "start.sh"]
