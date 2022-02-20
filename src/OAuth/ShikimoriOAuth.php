<?php

namespace M9snikfeed\PhpShikimori\OAuth;

use M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest;
use M9snikfeed\PhpShikimori\OAuth\Enum\Scopes;

class ShikimoriOAuth
{
    /**
     * @var ShikimoriApiRequest
     */
    protected $request;

    /**
     * @var string
     */
    protected $scopes = '';

    private const HOST = 'https://shikimori.one/oauth';
    private const ENDPOINT_AUTHORIZE = '/authorize';
    private const ENDPOINT_TOKEN = '/token';

    /**
     * @param string $userAgent
     */
    public function __construct(string $userAgent)
    {
        $this->request = new ShikimoriApiRequest(self::HOST, $userAgent);
    }


    /**
     * Генериуем ссылку и отдаем её клиенту, после этого клиент должен перейти по данной ссылке и получить код авторизации,
     * который он сможет передатьв getAccessAndRefreshToken и получить токены
     * @param string $clientId
     * @param string $redirectUrl
     * @return string
     */
    public function getAuthorizationUrl(string $clientId, string $redirectUrl): string{

        return self::HOST . self::ENDPOINT_AUTHORIZE . '?client_id=' . $clientId .
            '&response_type=code&redirect_uri=' . $redirectUrl . '&scope=' . $this->scopes;
    }

    /**
     * @param string $redirectUrl
     * @param string $clientSecret
     * @param string $clientId
     * @param string $authorizeCode
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getAccessAndRefreshToken(string $redirectUrl, string $clientSecret, string $clientId, string $authorizeCode): array
    {
        return $this->request->send(self::ENDPOINT_TOKEN, 'POST', [
            'grant_type' => 'authorization_code',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'code' => $authorizeCode,
            'redirect_uri' => $redirectUrl
        ])->toArray();
    }

    /**
     * @param string $clientSecret
     * @param string $clientId
     * @param string $refreshToken
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function refreshAccessToken(string $clientSecret, string $clientId, string $refreshToken): array
    {
       return $this->request->send(self::ENDPOINT_TOKEN, 'GET', [
            'grant_type' => 'refresh_token',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'refresh_token' => $refreshToken,
        ])->toArray();
    }

    /**
     * Set scopes.
     * @param Scopes $scopes
     * @return ShikimoriOAuth
     */
    public function setScopes(... $scopes): ShikimoriOAuth{
        foreach ($scopes as $scope){
            $this->scopes .= $scope->name . '+';
        }

        $this->scopes = substr($this->scopes, 0, -1);
        return $this;
    }
}