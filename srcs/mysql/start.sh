# rc is deprecated: use openrc to silence the system warning.
openrc default
/etc/init.d/mariadb setup
rc-service mariadb start


mysql -u root --password=rootpass -e "CREATE DATABASE IF NOT EXISTS $SQL_DB;"
mysql -u root --password=rootpass -e "CREATE USER IF NOT EXISTS '$SQL_DB_USER'@'%' IDENTIFIED BY '$SQL_DB_PASS';"
mysql -u root --password=rootpass -e "CREATE USER IF NOT EXISTS '$SQL_DB_USER'@'localhost' IDENTIFIED BY '$SQL_DB_PASS';"
mysql -u root --password=rootpass -e "GRANT ALL PRIVILEGES ON $SQL_DB.* TO '$SQL_DB_USER'@'%';"
mysql -u root --password=rootpass -e "GRANT ALL PRIVILEGES ON $SQL_DB.* TO '$SQL_DB_USER'@'localhost';"
mysql -u root --password=rootpass -e "FLUSH PRIVILEGES;"

mysql -u root --password=rootpass -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '$SQL_ROOT_PASS';"

rc-service mariadb stop
/usr/bin/mysqld_safe

# Note that mysqld safe will properly hang up the container for execution.
#This configuration will put the mysqld log into STDOUT of the terminal.