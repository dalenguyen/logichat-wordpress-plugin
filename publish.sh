#!/bin/bash

echo Prepare for Logichat plugin...\n

echo 1. Create dist folder\n
rm -rf dist
mkdir -p dist/logichat

echo 2. Copying plugin file...\n
cp -a * dist/logichat

echo 3. Removing unused folders
rm -rf dist/logichat/tests
rm -rf dist/logichat/.github
rm -rf dist/logichat/dist
rm -rf dist/logichat/node_modules

rm dist/logichat/.distignore
rm dist/logichat/.editorconfig
rm dist/logichat/.gitignore
rm dist/logichat/Gruntfile.js
rm dist/logichat/package.json
rm dist/logichat/*.yaml
rm dist/logichat/*.sh
rm dist/logichat/*.md

echo 4. Packing the plugin
cd dist
zip -r logichat.zip logichat
rm -rf logichat

echo \n5. Done!!!
