<h1>Setting Up</h1>

<h3>1. Requirements </h3>
PHP 8.0.2
MySQL Server
Composer
Node.js
 

<h3>2. Installation</h3>

2.1. Install composer
CD to the project directory and run

composer install

2.2. Install NPM dependencies.
Either of the commands will do:

npm install

or

yarn

if you prefer yarn.

2.3. Create a copy of the .env.example file and name it .env
2.4. Generate an app encryption key

php artisan key:generate

2.5. Create database for the app, but leave it empty. Consequently, modify DB credentials in the .env file.
2.6. Migrate the database

php artisan migrate

2.7. Seed the database

php artisan db:seed

Server Setup
For local development on Windows, append the line in the host file:
127.0.0.1 justnpot.local

For local development, modify the httpd-vhosts.conf of your Apache server and append the following

<VirtualHost *:80>
    DocumentRoot "path/to/your/be/justnpot/public"
    ServerName justnpot.local
    <Directory "path/to/your/be/justnpot/public">
       AllowOverride All
       Require all granted
    </Directory>
</VirtualHost>