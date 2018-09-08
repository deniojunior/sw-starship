#!/bin/bash

set -e

APP_ROOT=/usr/local/swstarship
WWW_ROOT=/usr/local/www
DOMAIN_NAME=`echo "$APP_NAME" | tr '[:upper:]' '[:lower:]'`.local

VIRTUAL_HOST_ROOT=$WWW_ROOT/$DOMAIN_NAME

if [ ! -d $WWW_ROOT ]; then
  mkdir -p $WWW_ROOT 
  chmod 2775 $WWW_ROOT
  chown vagrant.vagrant $WWW_ROOT
fi

su - vagrant -c "mkdir -p $VIRTUAL_HOST_ROOT"
su - vagrant -c "mkdir -p $VIRTUAL_HOST_ROOT/logs"

su - vagrant -c "ln -s $APP_ROOT/public $VIRTUAL_HOST_ROOT/public"

su - vagrant -c "ln -s $VIRTUAL_HOST_ROOT $DOMAIN_NAME"

if [ ! -f /etc/httpd/conf.d/main.conf ]; then
  cp $APP_ROOT/.development/apache/vhost.conf /etc/httpd/conf.d/zz-vhost.conf
fi