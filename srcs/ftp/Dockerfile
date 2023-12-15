FROM debian:buster

RUN apt-get update && apt-get upgrade
RUN apt-get install -y vsftpd
RUN mkdir -p /var/run/vsftpd/empty/
COPY ./vsftpd.conf /etc/
RUN adduser --disabled-password --gecos 'fmira' fmira
RUN echo "fmira:1234" | chpasswd
RUN echo "fmira" | tee -a /etc/vsftpd.userlist
COPY start.sh /
ENTRYPOINT ["sh", "start.sh"]