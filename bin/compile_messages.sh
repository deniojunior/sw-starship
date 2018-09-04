#!/bin/bash

set -e

# the 'one-liner' is nice but it's tricky if there's an error
#find . -name \*.po -execdir msgfmt messages.po -o messages.mo \;

echo "Compiling message catalogs to binary..."
for i in `find . -name \*.po`;
do
  echo $i;
  cd `dirname $i`
  /usr/bin/msgfmt `basename $i`;
  cd - > /dev/null
done
echo "Done!"
