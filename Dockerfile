FROM php8.3

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app
COPY . /app

RUN composer install

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000