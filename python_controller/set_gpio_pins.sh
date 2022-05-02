#!/bin/bash



chown root:www-data /dev/gpiomem
chmod g+rw /dev/gpiomem
chown root:www-data /dev/vchiq
chmod g+rwx /dev/vchiq
