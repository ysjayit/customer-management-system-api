# create databases
CREATE DATABASE IF NOT EXISTS `customer_management_db`;

# create customer_management_db_user user and grant rights
CREATE USER 'customer_management_db_user'@'db' IDENTIFIED BY 'secret';
GRANT ALL PRIVILEGES ON *.* TO 'customer_management_db_user'@'%';

