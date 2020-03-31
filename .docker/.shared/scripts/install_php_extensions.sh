#!/bin/sh

# add wget
# intl: zlib1g-dev libicu-dev g++
# mcrypt: libmcrypt-dev

apt-get update -yqq && apt-get -f install -yyq \
    g++ \
    gcc \
    libc-dev \
    libicu-dev \
    libmcrypt-dev \
    libxml2 \
    make \
    pkg-config \
    re2c \
    wget \
    zlib1g-dev \
;

# download helper script
# @see https://github.com/mlocati/docker-php-extension-installer/
wget -q -O /usr/local/bin/install-php-extensions https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions \
    || (echo "Failed while downloading php extension installer!"; exit 1)

# install extensions
chmod uga+x /usr/local/bin/install-php-extensions && sync && install-php-extensions --cleanup \
    bcmath \
    gd \
    intl \
    mcrypt \
    mysqli \
    opcache \
    pdo_mysql \
    soap \
    xdebug \
    xsl \
    zip \
;


# uncomment for php version 7.2 and greater
#pecl install mcrypt-1.0.2 && docker-php-ext-enable mcrypt

# for php 5.6
#docker-php-ext-install mcrypt
