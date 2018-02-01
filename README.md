# Laravel 5 AntiBot System

This is a simple Laravel package to prevent bots and spam in forms.

## Installing

Install via composer:

```
composer require jrmiranda/antibot
```

Add the following provider in your `config/app.php`:

```php
JrMiranda\AntiBot\AntiBotServiceProvider::class,
```

## Usage

Put inside the form:

```blade
{!! AntiBot::generate('email', 'time') !!}
```

## References


## License

MIT
