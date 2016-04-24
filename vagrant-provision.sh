#!/usr/bin/env bash

# Update apt-get
sudo apt-get update

# Install some packages
sudo apt-get install -y python-software-properties vim curl

# Add PHP5.6 repository
sudo add-apt-repository ppa:ondrej/php5-5.6

# Update apt-get
sudo apt-get update

# Install LAMP packages
sudo apt-get install -y build-essential php5 apache2 libapache2-mod-php5 php5-curl git-core

# Enable mod_rewrite
sudo a2enmod rewrite

# Symlink document root
sudo rm -rf /var/www
sudo ln -fs /vagrant/public /var/www

# Turn on error reporting and display errors with sed substitutions
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini

# Allow Override
sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Change Document Root - remove /html
sed -i 's/html//' /etc/apache2/sites-available/000-default.conf

# Restart Apache
sudo service apache2 restart

# Get Composer
cd /tmp
php -r "readfile('https://getcomposer.org/installer');" > composer-setup.php
php -r "if (hash_file('SHA384', 'composer-setup.php') === '7228c001f88bee97506740ef0888240bd8a760b046ee16db8f4095c0d8d525f2367663f22a46b48d072c816e7fe19959') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer

# Get Node JS
## Install PPA
curl -sL https://deb.nodesource.com/setup | sudo bash -
sudo apt-get install -y nodejs

# Install Gulp globally
sudo npm install --global gulp-cli

# Install Bower globally
sudo npm install --global bower

# Install Bower Installer globally
sudo npm install --global bower-installer