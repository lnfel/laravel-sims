# Laravel SIMS

## Pre-requisites

1. Composer
2. PHP

## Setup

1. Download or clone the **development branch** on this repo using *command line*:
```
    git clone -b development https://github.com/lnfel/laravel-sims.git
```

2. cd into **laravel-sims** directory:
```
    cd C:\path\to\laravel-sims
```

3. Install dependencies (will be installed on vendor folder):
```
    composer install
```

4. Initiate database
```
    // Delete any existing database tables
    php artisan db:wipe
    // Running migrations will create specified tables and columns
    php artisan migrate:refresh
    // Optional (for testing only)
    // This will delete any existing data on tables and refill with new dummy data
    php artisan db:seed
```

5. Run server
```
    php artisan serve
```

6. Whether you ran `php artisan db:seed` or not you can check database tests on:
> localhost:8000/account-test