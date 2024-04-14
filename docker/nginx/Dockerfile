FROM nginx:latest

RUN apt update && apt install -y procps
RUN groupadd -g 1000 nginx && \
    useradd -u 1000 -g nginx -s /bin/bash nginx
USER nginxuser





