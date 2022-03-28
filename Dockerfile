
FROM php:8
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get install software-properties-common -y
RUN add-apt-repository ppa:ondrej/apache2 && apt-get update
RUN apt-get install php8.0-mysql php8.0-dom
WORKDIR /app
COPY . /app
RUN composer install
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
