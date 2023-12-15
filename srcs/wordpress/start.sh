# Exchange the WP files
cp -rf /var/www/data/wordpress/* /var/www/wordpress/
rm -rf /var/www/data

/usr/sbin/php-fpm7 -F
