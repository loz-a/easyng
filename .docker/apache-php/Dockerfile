ARG PHP_VERSION
FROM php:${PHP_VERSION}-apache

ENV COMPOSER_ALLOW_SUPERUSER 1

ARG USER_ID
ARG GROUP_ID
ARG USER_NAME
ARG GROUP_NAME
ARG SERVICE_DIR="./apache-php"
COPY ./.shared/scripts/ /tmp/scripts/
RUN chmod +x -R /tmp/scripts/

# https://jtreminio.com/blog/running-docker-containers-as-current-host-user/
RUN /tmp/scripts/create_user_and_group.sh ${USER_ID:-0} ${GROUP_ID:-0} ${USER_NAME} ${GROUP_NAME}

# set timezone
ARG TZ=UTC
RUN /tmp/scripts/set_timezone.sh ${TZ} \
    && /tmp/scripts/install_php_extensions.sh \
    && /tmp/scripts/install_software.sh \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet

ARG PROJECT_WORK_DIR="/var/www/current"

COPY ${SERVICE_DIR}/apache/sites-available/000-default.conf /etc/apache2/sites-available/
COPY ${SERVICE_DIR}/php/*.ini   /usr/local/etc/php/conf.d/
COPY ${SERVICE_DIR}/php/php.ini /usr/local/etc/php/php.ini

ARG APP_HOST
ARG APP_DIR_NAME

RUN /tmp/scripts/modify_config.sh /etc/apache2/sites-available/000-default.conf \
    "__APACHE_ROOT" \
    "${PROJECT_WORK_DIR}/${APP_DIR_NAME}/public"

RUN /tmp/scripts/modify_config.sh /etc/apache2/sites-available/000-default.conf \
    "__APP_HOST" \
    "${APP_HOST} www.${APP_HOST}"

RUN echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf \
    &&  echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && a2enmod rewrite

# Configure sendmail mailhog
# [https://phauer.com/2017/test-mail-server-php-docker-container/]
RUN apt-get update \
    && apt-get install --no-install-recommends --assume-yes --quiet ca-certificates git golang-go \
    && rm -rf /var/lib/apt/lists/* \
    && mkdir -p /root/gocode \
    && export GOPATH=/root/gocode \
    && go get github.com/mailhog/mhsendmail \
    && mv /root/gocode/bin/mhsendmail /usr/local/bin \
    && rm -rf /root/gocode

# workdir
WORKDIR "$PROJECT_WORK_DIR"

RUN /tmp/scripts/cleanup.sh

EXPOSE 80 443

#USER www-data
