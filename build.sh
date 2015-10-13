#!/usr/bin/env bash
# Create Files Tar
cd files
tar cf ../build/files.tar *
cd ..

# Create Templates Tar
cd acptemplates
tar cf ../build/acptemplates.tar *
cd ..

cd templates
tar cf ../build/templates.tar *
cd ..

# Copy all Files to Build dir
rsync -rv --exclude files/ --exclude template/ --exclude build --exclude .git --exclude .idea/ ./ ./build/

#Build Plugin
cd build
tar czf plugin.tar.gz *
cp plugin.tar.gz ../
cd ..

# Clear Build Dir
rm -Rf ./build/*

#move Plugin to Server
scp ./plugin.tar.gz woltlab@192.168.1.48:htdocs/upload

#package install /home/woltlab/htdocs/upload/plugin.tar.gz
#package uninstall herolist.phoenix-plugins.de
