## Installation

Require this package with composer. It is recommended to only require the package for development.

```shell
composer require aqjw/iPay88 --dev
```

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php
```php
Aqjw\IPay88\IPay88ServiceProvider::class,
```

Copy the package config to your local config with the publish command:
```shell
php artisan vendor:publish --provider="Aqjw\IPay88\IPay88ServiceProvider"
```

Make the controller using the command:
```shell
php artisan ipay88:make
```