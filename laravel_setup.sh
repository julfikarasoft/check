#!/bin/bash

# Step 1: Install Composer (if not already installed)
if ! command -v composer &> /dev/null; then
    echo "Composer is not installed. Installing Composer..."
    EXPECTED_SIGNATURE="$(wget -q -O - https://composer.github.io/installer.sig)"
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    ACTUAL_SIGNATURE="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

    if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]; then
        >&2 echo 'ERROR: Invalid composer installer signature'
        rm composer-setup.php
        exit 1
    fi

    php composer-setup.php --quiet
    rm composer-setup.php
    mv composer.phar /usr/local/bin/composer
fi

# Step 2: Generate the .env file
echo "Generating .env file..."
cp .env.example .env



# Step 4: Install Composer dependencies
echo "Installing Composer dependencies..."
composer install
# Step 3: Set the application key
echo "Setting application key..."
php artisan key:generate
# Step 5: Start the Laravel project
echo "Starting the Laravel project..."
php artisan serve
