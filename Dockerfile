
FROM php:8-apache
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get -y install python3 python3-pip ffmpeg libsm6 libxext6
RUN pip3 install -r tensorflow numpy nibabel scipy glob2 opencv-python pandas 'torch==1.9.1'  'torchvision==0.10.1' tqdm matplotlib Pillow PyYAML requests seaborn
RUN apt-get install software-properties-common -y
WORKDIR /app
COPY . /app
RUN composer install
RUN composer dump-autoload
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
