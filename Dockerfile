FROM php:8.3-fpm

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

RUN apt-get update && apt-get install -y \
    libbrotli-dev \
    pkg-config \
    git \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-install pcntl

RUN pecl install swoole && docker-php-ext-enable swoole