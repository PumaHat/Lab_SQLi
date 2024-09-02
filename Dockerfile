FROM ubuntu:24.04

ENV DEBIAN_FRONTEND noninteractive

COPY ./start.sh /start.sh
RUN chmod +x /start.sh

RUN apt update && apt install -y apache2 \
php \
php-mysql

EXPOSE 80

CMD ["bash", "/start.sh"]

