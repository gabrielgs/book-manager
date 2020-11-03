# book-manager-api
This project use tha lastest version of larave in this case Laravel 8

## Requirements
- PHP >= 7.3
- Composer
- MySQL >= 5.7

## Install Composer

See instructions for installations
[https://getcomposer.org/doc/00-intro.md](https://getcomposer.org/doc/00-intro.md)

## Fill the .env file
- Rename the .env.example file to .env
- Modify the netx lines with your MySQL information.
 The database library so don't change DB_DATABASE keep it like that.

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=library
    DB_USERNAME=
    DB_PASSWORD=
```

## Intall dependencies
Run the following command
```
composer install
```

## Set application key
To generate the application key run
```
php artisan key:generate
```

Once you generated you can see it in your .env file:

APP_KEY={application_key}

## Create the Database
Create a database and name it **library**

## Migrations
We need to run migrations to create tables inside database.

Run the  following command
```
php artisan migrate
```

## Seed Database
Now we fill the database with some information.

Run
```
php artisan db:seed
```

## Run de api
We are ready to run de application, type:
```
php artisan serve
```



