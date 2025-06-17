# Local Installation Guide

This guide shows you how to test the package locally before publishing it to Packagist.

## Step 1: Create a test Laravel project

```bash
composer create-project laravel/laravel test-project
cd test-project
```

## Step 2: Add the package locally

In your test Laravel project's `composer.json`, add:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../package-pro"
        }
    ]
}
```

## Step 3: Install the package

```bash
composer require ghayas/hello-world-package
```

## Step 4: Test the package

1. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

2. Visit `http://localhost:8000/hello-world` to see the hello world page.

## Step 5: Test publishing assets

```bash
# Publish views
php artisan vendor:publish --tag=views

# Publish config
php artisan vendor:publish --tag=config
```

## Publishing to Packagist

When you're ready to publish the package:

1. Push your code to GitHub
2. Create a release on GitHub
3. Submit the package to Packagist at https://packagist.org/packages/submit
4. Once approved, others can install it with:
    ```bash
    composer require ghayas/hello-world-package
    ```
