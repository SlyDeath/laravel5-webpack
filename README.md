# Laravel 5 Webpack integration
[![Latest Stable Version](https://poser.pugx.org/slydeath/laravel5-webpack/v/stable)](https://packagist.org/packages/slydeath/laravel5-webpack)
[![Total Downloads](https://poser.pugx.org/slydeath/laravel5-webpack/downloads)](https://packagist.org/packages/slydeath/laravel5-webpack)
[![License](https://poser.pugx.org/slydeath/laravel5-webpack/license)](https://packagist.org/packages/slydeath/laravel5-webpack)

## Установка

Добавить пакет в composer.json:
```bash
composer require slydeath/laravel5-webpack
```

После установки пакета добавить сервис-провайдер в массив `providers` в файле конфигурации `config/app.php`:
```php
SlyDeath\Webpack\WebpackServiceProvider::class,
```

Если необходимо менять стандартную конфигурацию, то нужно разместить файл конфигурации пакета:
```bash
php artisan vendor:publish --provider="SlyDeath\Webpack\WebpackServiceProvider" --tag=config
```

Пример использования для CSS и JS:
```html
<link href="{{ webpack('css') }}" rel="stylesheet" charset="utf-8">
<script src="{{ webpack('js') }}" type="text/javascript" charset="utf-8"></script>
```

Первым параметром указывается расширение файла, вторым - бандл. По-умолчанию имя бандла - `app`. Если имя бандла отличается или необходим второй бандл (например `vendor`) то нужно передать его имя вторым параметром:
```html
<link href="{{ webpack('css', 'vendor') }}" rel="stylesheet" charset="utf-8">
```

