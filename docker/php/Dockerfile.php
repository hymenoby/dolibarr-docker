FROM php:7.2-fpm
RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libmcrypt-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd \
	&& docker-php-ext-install pdo pdo_mysql \
	&& docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY ./conf.d/90-custom.ini /usr/local/etc/php/conf.d/
	