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

> By default composer will run autoload optimizations, in case you have issue initiating database run:
```
    composer dump-autoload
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
PSCG migrations
```
    php artisan migrate --path="database/migrations/prpcmblmts"
```

PSCG tables data dump (regions, provinces, cities/municipalities, barangays)
```
    php artisan db:seed --class=PhilippineRegionsTableSeeder
    php artisan db:seed --class=PhilippineProvincesTableSeeder
    php artisan db:seed --class=PhilippineCitiesTableSeeder
    php artisan db:seed --class=PhilippineBarangaysTableSeeder
```

5. Run server
```
    php artisan serve
```

6. Whether you ran `php artisan db:seed` or not you can check database tests on:
> localhost:8000/account-test

## Database testing

Some helpful commands:

1. `php artisan db:wipe` - Drop all tables, views, and types.
2. Want to just drop a specific table?
```
    php artisan migrate:refresh --path="/database/migrations/prpcmblmts/1995_10_23_300000_create_philippine_cities_table.php
```
This will drop `philippine_cities` table found in `/database/migrations/prpcmblmts/` and re-run migration for creating philippine_cities table.