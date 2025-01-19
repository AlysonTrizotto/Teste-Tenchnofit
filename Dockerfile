# Use a imagem base do PHP 8.3 com FPM
FROM php:8.3-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    libbrotli-dev \
    pkg-config \
    git \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Instala extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql pcntl



# Instala o Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-install pcntl

# Instala e habilita o Swoole
RUN pecl install swoole && docker-php-ext-enable swoole


# Define o diretório de trabalho
WORKDIR /var/www

# Copia os arquivos do projeto para o container
COPY . .

# Instala as dependências do Composer
RUN composer install --no-dev --optimize-autoloader

# Instala o RoadRunner
RUN composer require spiral/roadrunner --with-all-dependencies && \
    ./vendor/bin/rr get-binary


# Expõe a porta 8000 (usada pelo Octane)
EXPOSE 8000

# Comando para iniciar o Octane
CMD ["php", "artisan", "octane:start", "--host=0.0.0.0", "--port=8000"]






