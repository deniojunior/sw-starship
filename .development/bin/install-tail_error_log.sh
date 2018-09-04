#!/bin/bash

set -e

mkdir ~/bin
echo 'tail -f /vagrant/log/error.log | sed "s/\\\n/\\n/g; s/\\\t/\\t/g; s/, referer/\\treferer/g"' > ~/bin/tail_error_log.sh
chmod 700 ~/bin/tail_error_log.sh
