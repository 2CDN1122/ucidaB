# ベースイメージとして PHP と Apache を使用
FROM php:8.2-apache

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libonig-dev \
    build-essential \
    libmariadb-dev \
    && docker-php-ext-install pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer のインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# php.ini をカスタマイズする
COPY php.ini /usr/local/etc/php/

# 作業ディレクトリを設定
WORKDIR /var/www/html

# ソースコードをコンテナにコピー
COPY ./src /var/www/html

# Apache サーバーの設定を公開ポート 80 でリッスンするようにする
EXPOSE 80
