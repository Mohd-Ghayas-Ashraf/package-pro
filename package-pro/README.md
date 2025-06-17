# Hello World Package

A Laravel package that provides a Hello World view component.

## Installation

You can install the package via composer:

```bash
composer require ghayas/hello-world-package
```

## Usage

### Option 1: Use the provided route

The package automatically registers a route at `/hello-world` that displays the hello world page.

### Option 2: Use the view directly

You can use the view directly in your controllers:

```php
public function index()
{
    return view('hello-world-package::index');
}
```

### Option 3: Publish the views

If you want to customize the views, you can publish them to your application:

```bash
php artisan vendor:publish --tag=views
```

This will publish the views to `resources/views/vendor/hello-world-package/` where you can modify them.

Then use them in your controllers:

```php
public function index()
{
    return view('vendor.hello-world-package.index');
}
```

## Configuration

You can publish the configuration file:

```bash
php artisan vendor:publish --tag=config
```

This will create a `config/hello-world-package.php` file where you can customize:

-   `message`: The message to display (default: 'Hello world')
-   `route_prefix`: Optional route prefix for the package routes

## Requirements

-   PHP ^8.1
-   Laravel ^10.0|^11.0|^12.0

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
