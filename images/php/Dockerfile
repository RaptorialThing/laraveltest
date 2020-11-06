FROM php:7.2-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
		libmemcached-dev zlib1g-dev \
		libmagickwand-dev \
    		libmagickcore-dev \
		libc-client-dev \
		libkrb5-dev \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
	&& docker-php-ext-install -j$(nproc) imap \
	&& docker-php-ext-install -j$(nproc) gd \
	&& docker-php-ext-install pdo_mysql mysqli soap zip bcmath pcntl sockets 

RUN pecl install redis-4.0.1 \
	&& pecl install xdebug-2.6.0 \
	&& pecl install swoole \
	&& pecl install mongodb \
	&& pecl install memcached \
	&& pecl install imagick \
	&& docker-php-ext-enable redis xdebug swoole mongodb memcached imagick opcache


RUN rm -r /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini



RUN apt-get update && apt-get install -y --no-install-recommends git \
	&& git clone --depth=1 git@github.com:RaptorialThing/laraveltest.git \
	&& cd laraveltest \
	&& composer install

WORKDIR /var/www

EXPOSE 9000 
CMD ["php-fpm"]