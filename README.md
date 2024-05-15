# OSU API PHP
Библиотека для взаимодействия с API OSU! на PHP, включает авторизацию OAuth2 и методы API v2. Полная документация предоставлена на [сайте OSU](https://osu.ppy.sh/docs/index.html).

# 1. Зависимости
* php: 8.3 и новее

# 2. Установка
Установите пакет через Composer
```bash
composer require katsu/osu-api-php
```



# 3. Использование

## Авторизация

```php
<?php declare(strict_types=1);
require_once __DIR__.'/../vendor/autoload.php';

$autorize = new \Katsu\OsuApiPhp\Runtime\Authorize(
    123, // id клиента
    'secret-sectet-1231', // секретный ключ клиента
    'http://localhost', // uri приложения
    'public', //scopes
);

$authUri = $autorize->getAuthorizationUrl() //Отдаст адрес для авторизации в OAuth приложении, после успешной авторизации вернет code
...

$code = '1238e9sf12jsfl;1292-1' // Код, который, мы получаем после авторизации в приложении
$autorize->getAccessToken($code) //Получит обьект с accessToken, refreshToken, expiresIn, tokenType
```

## Работа с методами API

```php
$tokens = new \Katsu\OsuApiPhp\Dto\Tokens(
    'Bearer',
    86400,
    'eyJ0e17KV1QiLC41iJSUzI1NiJ9...',
    'def87007c5a47742dg314jw5217we3b...',
); 

$oauth = new \Katsu\OsuApiPhp\Dto\OAuthClient(123, 'secret-sectet-1231'); //id клиента и его секретный ключ

$client = \Katsu\OsuApiPhp\Client::create($oauth); //Создаем экземпляр api клиента
$client->setTokens($tokens); //Устанавливаем токены


$beatmapset = $client->getBeatmapsetById(1); // Вернет объект beatmapset с id = 1 
```