
FROM php:8-apache
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get -y install python3 python3-pip ffmpeg libsm6 libxext6
RUN pip3 install tensorflow numpy nibabel scipy glob2 opencv-python pandas 'torch==1.9.1'  'torchvision==0.10.1' tqdm matplotlib Pillow PyYAML requests seaborn cvlib
RUN apt-get install software-properties-common -y
WORKDIR /app
COPY . /app
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction
RUN composer install
RUN composer dump-autoload
RUN chmod +x artisan
CMD php artisan serve --host=127.0.0.1 --port=8181
EXPOSE 8181
