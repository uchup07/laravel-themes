## Laravel Themes
[![Source](https://img.shields.io/packagist/v/uchup07/laravel-themes.svg?style=flat-square)](https://github.com/uchup07/laravel-themes)
[![Latest Stable Version](https://poser.pugx.org/uchup07/laravel-themes/v/stable?format=flat-square)](https://packagist.org/packages/uchup07/laravel-themes)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)
[![Total Downloads](https://img.shields.io/packagist/dt/uchup07/laravel-themes.svg?style=flat-square)](https://packagist.org/packages/uchup07/laravel-themes)

This is a Laravel package that adds basic support for managing themes. Inspire from [Caffeinated Themes](https://github.com/caffeinated/themes) for support on Laravel 9

## Installation
Simply install the package through Composer. From here the package will automatically register its service provider and `Theme` facade.

```
composer require uchup07/laravel-themes
```

## Config
To publish the config file, run the following:
```
php artisan vendor:publish --provider="Uchup07\LaravelThemes\LaravelThemesServiceProvider" --tag="config"
```

# BASIC USAGE
## Create a theme
Theme can be created using `make:laravel-theme <slug>` Example artisan command:
```
php artisan make:laravel-theme bootstrap
```

this will generate folder `themes/bootstrap` on root application.

## Helpers

Laravel Themes includes a global "helper" PHP function. This is used by the package itself; however, you are free to use it in your own code if you find it convenient.

### theme_path
The `theme_path` function returns the fully qualified path to either the currently active or specified theme's directory (passed via the second parameter).

```php
$path = theme_path('resources/js/bootstrap.js');

$path = theme_path('resources/js/bootstrap.js', 'bootstrap');
```

### Security

If you discover any security related issues, please email uchup07@gmail.com instead of using the issue tracker.

## Credits

-   [Yusuf Mulhajat](https://github.com/uchup07)
-   [All Contributors](../../contributors)

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.