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


````
$clientId = 'IWJ-6QnQi5so_dtyHswoTOwQ07YRev3UAnc7H-OVRhM';
$clientSecret = 'EwgBSXrBDChK7-YsqE8fQz86Ws_pwG3lAhUiyXXffqs';
$authCodeRedirect = 'https://localhost/auth/shikimori/callback';

$shikiOAuth = new ShikimoriOAuth('YukiDub.Fun');

///getAuthorizationToken method will return authorization URL. After passing through it and upon successful authorization, AUTH_CODE will be issued.
echo $shikiOAuth->setScopes(Scopes::user_rates, Scopes::comments)->getAuthorizationUrl($clientId, $authCodeRedirect));

$accessToken = $shikiOAuth->getAccessAndRefreshToken($authCodeRedirect, $clientSecret, $clientId, 'AUTH_CODE');
$apiClient = new ShikimoriApiClient('YukiDub.Fun');
$apiClient->setAccessToken('ACCESS_TOKEN');
var_dump($apiClient->users()->whoami($accessToken['access_token']));
````