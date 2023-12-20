#!/usr/bin/env bash

# Clear cache
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
php artisan key:generate -n --force

# Build assets
npm install
npm run build

# Set access to folders
chmod 0777 vendor/* -Rf
chmod 0777 storage/* -Rf
chmod 0777 node_modules/* -Rf

# Install database tables
## Install migration table
php artisan migrate:install -n

## Run all migrations
php artisan migrate -n --force

# Seed data
php artisan db:seed -n --force

# Generate models ide-helpers
php artisan ide-helper:generate
php artisan ide-helper:meta
php artisan ide-helper:models --write-mixin
