#!/bin/bash

WP_PATH="/var/www/html"

echo "===== Checking if WordPress is installed... ====="
if [ ! -f "$WP_PATH/wp-config.php" ]; then
    echo "===== Downloading WordPress... ====="
    wp core download --path=$WP_PATH --allow-root

    echo "===== Creating wp-config.php... ====="
    wp config create --dbname=exampledb --dbuser=exampleuser --dbpass=examplepass --dbhost=db --path=$WP_PATH --allow-root
    sleep 8

    echo "Defining WP_HOME and WP_SITEURL in wp-config.php..."
    echo "define('WP_HOME', 'http://localhost:8000');" >> $WP_PATH/wp-config.php
    echo "define('WP_SITEURL', 'http://localhost:8000');" >> $WP_PATH/wp-config.php
fi

if ! wp core is-installed --allow-root --path=$WP_PATH; then
    wp core install --url='http://localhost:8000' --title='Crypto Blocks Demo' --admin_user='admin' --admin_password='admin' --admin_email='admin@example.com' --allow-root --path=$WP_PATH
    echo "===== WordPress installation completed. ====="
fi

echo "===== Activation of plugin 'crypto-blocks' ====="
wp plugin activate crypto-blocks --allow-root --path=$WP_PATH

echo "===== Setting Creds. ====="
wp cb set-creds --force --allow-root --path=$WP_PATH

echo "===== Parsing news. ====="
wp cb parse-news --allow-root --path=$WP_PATH

echo "===== Creating Homepage. ====="
wp cb create-homepage --allow-root --path=$WP_PATH

echo "===== Flushing Permalinks ====="
wp rewrite flush --allow-root --path=$WP_PATH
wp rewrite structure '/%postname%' --allow-root --path=$WP_PATH

echo "===== Starting Apache... ====="
apache2-foreground

# Keep the script running to prevent container exit
tail -f /dev/null
