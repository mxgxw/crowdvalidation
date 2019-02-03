#!/bin/bash
echo Pulling last updates from FrontEnd Repo...
cd ..
cd contemosnosotros-ui
git checkout master
git checkout package-lock.json
git pull
echo Installing Dependencies
npm i
echo Creating build
npm run build
echo Syncing Deploying files to Cake Home
rsync -avr --omit-dir-times --no-perms --ignore-times build/ ../contemosnosotros/webroot

