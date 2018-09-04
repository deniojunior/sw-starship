#!/usr/bin/env bash
set -e

CURL="/usr/bin/curl --remote-name --silent --location"
PHPUNIT=https://phar.phpunit.de/phpunit-5.7.phar

cd ~ && $CURL $PHPUNIT && chmod 755 phpunit-5.7.phar && sudo mv phpunit-5.7.phar /usr/local/bin/phpunit
