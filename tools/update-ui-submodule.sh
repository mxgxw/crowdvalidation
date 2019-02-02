#!/bin/bash
echo Pulling last updates from FrontEnd Repo...
cd ..
cd contemosnosotros-ui
git pull
echo Installing Dependencies
npm i
echo Creating build
npm run build
echo Syncing Deploying files to /var/html
rsync -avr --omit-dir-times --no-perms --ignore-times build/ /var/www/html

