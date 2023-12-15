FROM alpine:3.12
VOLUME ["/sys/fs/cgroup"]
RUN apk update && apk upgrade && apk add openrc mariadb mariadb-common mariadb-client
COPY my.cnf /etc/
COPY start.sh /
CMD sh start.sh