<?php

require (__DIR__ . '/../vendor/autoload.php');

use M9snikfeed\PhpShikimori\Client\ShikimoriApiClient;
use M9snikfeed\PhpShikimori\OAuth\Enum\Scopes;
use M9snikfeed\PhpShikimori\OAuth\ShikimoriOAuth;

$apiClient = new ShikimoriApiClient('YukiDub.Fun');
$apiClient->setAccessToken('ACCESS_TOKEN');
var_dump($apiClient->users()->whoami());

//$clientId = 'IWJ-6QnQi5so_dtyHswoTOwQ07YRev3UAnc7H-OVRhM';
//$clientSecret = 'EwgBSXrBDChK7-YsqE8fQz86Ws_pwG3lAhUiyXXffqs';
//$authCodeRedirect = 'https://localhost/auth/shikimori/callback';
//
//$shikiOAuth = new ShikimoriOAuth('YukiDub.Fun');
//var_dump($shikiOAuth->setScopes(Scopes::user_rates, Scopes::comments)->getAuthorizationUrl($clientId, $authCodeRedirect));
//
//var_dump($shikiOAuth->getAccessAndRefreshToken($authCodeRedirect, $clientSecret, $clientId, 'syf0Px2MSGBu1oY8bL6oQjwe16QuN-5-TtYpLfZ9rXU'));