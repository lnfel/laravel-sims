# Laravel SIMS
---
## Setting up environment when creating new laravel app

1. Install `composer`
2. Download Laravelinstaller using composer:
```
    composer global require laravel/installer
```
3. Create your laravel app:
```
    laravel new your-app-name
```
4. `cd` into your app
```
    cd your-app-name
```
5. You can now try running the server using `artisan`:
```
    php artisan serve
```
## Simulating hostinger directory

1. Modify `/app/Providers/AppServiceProvider.php`:
```
    <?php
    
    namespace App\Providers;
    
    use Illuminate\Support\ServiceProvider;
    
    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            // Add this
            $this->app->bind('path.public', function() {
                return base_path('../public_html/laravel-sims');
            });
        }
```
2. Inside your project folder, create a new folder named `public_html`
3. Rename `/public` folder same as your project folder
* In this case rename it to `your-app-name`
4. Move your newly renamed folder inside `public_html`
5. Open `index.php` inside `/public_html/your-app-name` and change the following:
```
    require __DIR__.'/../vendor/autoload.php';
    $app = require_once __DIR__.'/../bootstrap/app.php';
```
to
```
    require __DIR__.'/../../your-app-name/vendor/autoload.php';
    $app = require_once __DIR__.'/../../your-app-name/bootstrap/app.php';
```
5. Now **copy** `/public_html/` just one level outside of your project folder
6. For example you have your project inside `sites` folder, you should have a Directory like this afterwards:
```
sites
	--your-app-name
		--app
		--bootstrap
		--config
		--database
		--public_html
		--resources
		--routes
		--storage
		--tests
		--vendor
	--public_html
		--your-app-name
```
> Note: the above setup would now work when deployed on hostinger however, there is one more issue you can experience. If you're developing your app on local machine and you're using `php artisan serve command` to serve your app you're going to break it with above syntax only. You still need to adjust `server.php` file which exists in main directory. Edit the contents of it and replace each occurance of `/public` to `/../public_html/`
7. Open server.php inside your project folder:
```
<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/../public_html'.$uri)) {
    return false;
}

require_once __DIR__.'/../public_html/your-app-name/index.php';
```

## References

https://stackoverflow.com/questions/30198669/how-to-change-public-folder-to-public-html-in-laravel-5

https://dev.to/pushpak1300/deploying-laravel7-app-on-shared-hosting-hostinger-31cj