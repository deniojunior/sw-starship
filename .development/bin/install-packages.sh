#!/bin/bash

set -e

dnf install -y \
  ack \
  bind-utils \
  gcc \
  git \
  redhat-rpm-config \
  telnet \
  tmux \
  unzip \
  httpd \
  libffi-devel \
  php71 \
  php71-mbstring \
  php71-intl \
  php71-mysqlnd \
  php71-pdo \
  php71-pecl-xdebug \
  php71-pecl-zip \
  php71-xml \
