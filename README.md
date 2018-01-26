# Betsys test task implementation

## Installation

### Install from git repository
Run the following command:
```
git clone https://github.com/VIPrules/betsys-test.git
```

### Extract from zip-archive
Just extract the zip-archive into a folder.

## Post install

Follow to the created folder.

### .htaccess
Depending on the environment (dev/prod), copy the .htaccess file in the 'web' folder  without the suffix.

### Install dependencies

Run the commands:
```
composer install
composer update
```
or
```
php <path-to-composer>/composer.phar install
php <path-to-composer>/composer.phar update
```

### Database

1. Create a database and insert credentials to the app/config/parameters.yml

2. Run the command:
```
php app/console doctrine:migrations:migrate
```

### Admin user
Run the command:
```
php app/console fos:user:create <username> <user_email> <user_password> --super-admin
```

This creates the admin user which has an access to the website's Admin Panel.

## Usage
Enjoy!