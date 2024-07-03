FROM wordpress:latest

FROM wordpress:latest AS composer-deps-installer

WORKDIR /dist

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY . .

RUN composer install --prefer-dist --no-scripts --no-progress --no-interaction --no-dev
RUN composer dump-autoload --optimize --apcu --no-dev

FROM node:18.20-alpine AS js-assets-builder

WORKDIR /dist

COPY --from=composer-deps-installer /dist /dist

RUN npm install

FROM wordpress:latest AS runner

WORKDIR /var/www/html

COPY --from=wordpress:cli /usr/local/bin/wp /usr/local/bin/wp
COPY --from=js-assets-builder /dist /var/www/html/wp-content/plugins/crypto-blocks

EXPOSE 80

COPY entrypoint.sh /usr/local/bin/entrypoint.sh

RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["apache2-foreground"]