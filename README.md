# shikimori-api-php

PHP library for Shikimori API interaction, includes OAuth 2.0 authorization and API v1-v2 methods. Full Shikimori API features documentation can be found [here](https://shikimori.one/api/doc).

## 1. Prerequisites

* PHP 8.1 or later

## 2. Installation

Require library via composer

```
composer require m9snikfeed/php-shikimori
```

## 3. Initialization

Create ShikimoriApiClient object using the following code:

```
$apiClient = new ShikimoriApiClient('YukiDub.Fun');
var_dump($apiClient->anime()->get(1)->getImage()->getX48());
```
The ShikimoriApiClient constructor takes the user-agent as the first parameter.

## 4. Authorization

Will be later




###------------------------------------
ЗЫ: я ЗАДОЛБАЛСЯ писать это добро