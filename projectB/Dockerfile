FROM php:8.2-apache

# 必要なパッケージのインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libonig-dev \
    libxml2-dev

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# php.ini をコンテナにコピー
COPY php.ini /usr/local/etc/php/

# アプリケーションコードをコンテナにコピー
COPY ./src /var/www/html

WORKDIR /var/www/html

# Apache サーバの起動を設定
EXPOSE 80
