#!/bin/sh

if [ ! -f "./vendor/autoload.php" ]; then
    composer install
fi

exec docker-php-entrypoint "$@"

