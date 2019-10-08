#!/usr/bin/env bash

source ./build/appveyor/try_catch.sh

try
    sh vendor/bin/phpunit --verbose -c ./phpunit.xml.dist;
catch || {
    exit 1
}
