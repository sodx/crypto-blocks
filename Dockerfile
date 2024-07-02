FROM wordpress:latest

RUN apt-get update && \
    apt-get install -y \
    git \
    unzip

RUN mkdir -p /var/www/html/wp-content/plugins/crypto-blocks

COPY . /var/www/html/wp-content/plugins/crypto-blocks

RUN chown -R www-data:www-data /var/www/html/wp-content/plugins/crypto-blocks

EXPOSE 80

CMD ["apache2-foreground"]
