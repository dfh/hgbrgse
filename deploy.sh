#!/bin/sh

rsync -azv --delete --exclude-from="deploy_exclude" . www-data@gibson.hgbrg.se:/var/www/hgbrg.se
