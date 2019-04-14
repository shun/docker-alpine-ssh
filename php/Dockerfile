FROM php:7.2-alpine

RUN apk update && apk add vim openssh-server sudo bash

ARG WORKUSR=dev
RUN adduser -S ${WORKUSR} -s /bin/bash \
	&& echo "${WORKUSR} ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers \
	&& echo "${WORKUSR}:${WORKUSR}" | chpasswd 

#RUN useradd -m -p `echo "$WORKUSR" | mkpasswd -s -m sha-512` -s /bin/bash $WORKUSR && gpasswd -a $WORKUSR sudo
RUN sed -i.bak "s;#PasswordAuthentication yes;PasswordAuthentication yes;g" /etc/ssh/sshd_config
RUN mkdir -p /var/run/sshd
RUN ssh-keygen -t rsa -f /etc/ssh/ssh_host_rsa_key -N ''
