#!/bin/bash

set -e

CURL="/usr/bin/curl --remote-name --silent"
COMPOSER=https://getcomposer.org/download/1.4.2/composer.phar

cd ~ && $CURL $COMPOSER && chmod 755 composer.phar && mv composer.phar /usr/local/bin/composer
