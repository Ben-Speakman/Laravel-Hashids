# Hashids for Laravel 4

## Installation
First install it using Composer. Edit your project's `composer.json` file to require `alexsoft/laravel-hashids`.

    "require": {
        "alexsoft/laravel-hashids": "~1.1.0"
    }

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Alexsoft\LaravelHashids\LaravelHashidsServiceProvider'

Also add a class alias.

    'Hashids' => 'Alexsoft\LaravelHashids\Facades\Hashids'

That's it! You're all set to go.
