FROM alpine:3.12
RUN apk update && apk upgrade && apk add nginx openssl
COPY ./default.conf /etc/nginx/conf.d/default.conf
RUN openssl req -x509 -nodes -days 365 -subj "/C=UK/ST=London/L=London/O=London/OU=Place/CN=fmira" -newkey rsa:2048 -keyout /etc/ssl/private/nginx.key -out /etc/ssl/certs/nginx.crt;

# NGINX PID file will be stored here. Othervise, the container will stop with the NODIR error.
RUN mkdir /run/nginx/

# Start the server as a process, not a daemon.
ENTRYPOINT ["nginx", "-g", "daemon off;"]