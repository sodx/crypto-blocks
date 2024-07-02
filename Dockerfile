FROM wordpress:latest

RUN apt-get update && \
    apt-get install -y \
    git \
    unzip

EXPOSE 80

CMD ["apache2-foreground"]
