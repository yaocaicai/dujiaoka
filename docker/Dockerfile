FROM ioiox/php-nginx:7.4-alpine
LABEL maintainer="stille@ioiox.com"

ENV INSTALL true
ENV MODIFY false
ENV VERSION 2.0.6

WORKDIR /

RUN git clone https://github.com/yaocaicai/dujiaoka.git

COPY ./conf/default.conf /opt/docker/etc/nginx/vhost.conf
COPY ./conf/dujiao.conf /opt/docker/etc/supervisor.d/
COPY ./modify /dujiaoka/modify
COPY start.sh /
COPY start-hook.sh /dujiaoka/

WORKDIR /dujiaoka

RUN set -xe \
    && composer install -vvv \
    && chmod +x /start.sh \
    && chown -R application:application /dujiaoka/ \
    && chmod -R 0755 /dujiaoka/ \
    && mv /dujiaoka/storage /dujiaoka/storage_bak \
    && sed -i "s?\$proxies;?\$proxies=\'\*\*\';?" /dujiaoka/app/Http/Middleware/TrustProxies.php \
    && rm -rf /root/.composer/cache/ /tmp/*

CMD /start.sh
