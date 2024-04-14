FROM nginx:latest

RUN apt update && apt install -y procps

# Check if the group 'nginx' exists before adding it
RUN getent group nginx || groupadd -g 1000 nginx

# Check if the user 'nginx' exists before adding it
RUN getent passwd nginx || useradd -u 1000 -g nginx -s /bin/bash nginx

COPY nginx.conf /etc/nginx/

RUN apt update && apt upgrade -y && \
    apt install -y openssl certbot bash

RUN groupadd -g 82 www-data && \
    useradd -u 82 -g www-data -s /bin/bash www-data

EXPOSE 80 443

USER nginx




