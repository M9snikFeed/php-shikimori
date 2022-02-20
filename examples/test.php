<?php

require (__DIR__ . '/../vendor/autoload.php');

use M9snikfeed\PhpShikimori\Client\ShikimoriApiClient;
use M9snikfeed\PhpShikimori\OAuth\Enum\Scopes;

$apiClient = new ShikimoriApiClient('YukiDub.Fun');
var_dump($apiClient->anime()->get(1));

//$clientId = 'IWJ-6QnQi5so_dtyHswoTOwQ07YRev3UAnc7H-OVRhM';
//$clientSecret = 'EwgBSXrBDChK7-YsqE8fQz86Ws_pwG3lAhUiyXXffqs';
//$authCodeRedirect = 'https://localhost/auth/shikimori/callback';
//
//$shikiOAuth = new \m9snikfeed\phpShikimori\oauth\ShikimoriOAuth('YukiDub.Fun');
//var_dump($shikiOAuth->setScopes(Scopes::user_rates, Scopes::comments)->getAuthorizationUrl($clientId, $authCodeRedirect));
//
//var_dump($shikiOAuth->getAccessAndRefreshToken($authCodeRedirect, $clientSecret, $clientId, 'Tr2-TfZnkNX2cAWj4bc5qm0XX_7gg_gkW93A5JmQFLQ'));