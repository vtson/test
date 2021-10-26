FROM php:7.4

RUN apt-get update -y && apt-get install -y openssl zip unzip git \
    libonig-dev \
    libzip-dev
RUN docker-php-ext-install pdo mbstring pdo_mysql

WORKDIR /var/www/html
COPY . .
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
CMD php artisan serve --host=0.0.0.0
EXPOSE 8000
