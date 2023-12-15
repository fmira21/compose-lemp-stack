
#chown for ftp work dir
chown -R fmira:fmira /home/fmira

#start ftp-server
vsftpd /etc/vsftpd.conf