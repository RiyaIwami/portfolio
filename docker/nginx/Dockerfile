FROM nginx:latest

RUN apt update && apt install -y procps
RUN groupadd --force -g 1000 nginx && \
    useradd --force -u 1000 -g nginx -s /bin/bash nginx

COPY nginx.conf /etc/nginx/

RUN apt update && apt upgrade -y && \
    apt install -y openssl certbot bash

RUN groupadd -g 82 www-data && \
    useradd -u 82 -g www-data -s /bin/bash www-data

EXPOSE 80 443

USER nginx



