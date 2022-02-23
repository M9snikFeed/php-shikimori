<?php

namespace M9snikfeed\PhpShikimori\Client;

use M9snikfeed\PhpShikimori\Exceptions\ApiRequestException;
use M9snikfeed\PhpShikimori\Exceptions\ShikimoriUnauthorizedException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ShikimoriApiRequest
{
    /**
     * @var string
     */
    private string $host;

    /**
     * @var string
     */
    private string $userAgent;

    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $СurlHttpClient;

    /**
     * @var string|null
     */
    private ?string $accessToken = null;

    /**
     * @param string $host
     * @param string $userAgent
     */
    public function __construct(string $host, string $userAgent)
    {
        $this->host = $host;
        $this->СurlHttpClient = HttpClient::create();
        $this->userAgent = $userAgent;
    }

    /**
     * @param string $path
     * @param string $method
     * @param array $params
     * @param string|null $accessToken
     * @return ResponseInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */

    public function send(string $path, string $method = "GET", array $params = []): ResponseInterface
    {
        $headers = array(
            'User-Agent' => $this->userAgent,
        );

        if (!is_null($this->accessToken)){
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        return $request = $this->СurlHttpClient->withOptions(
            array('headers' => $headers)
        )->request(
            $method,
            $this->host . $path,
            [
                "query" => $params
            ]
        );
    }

    /**
     * Get request.
     * @param $path
     * @param array $params
     * @param string|null $accessToken
     * @return array
     * @throws ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws ShikimoriUnauthorizedException
     */
    public function get($path, array $params = [])
    {
        try {
            return $this->send($path, params: $params)->toArray();
        } catch (ClientExceptionInterface $ex) {
            if ($ex->getCode() === 401){
                throw new ShikimoriUnauthorizedException('Unauthorized, accessToken is missing or invalid');
            }
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Post request
     * @param string $path
     * @param array|null $params
     * @param string|null $accessToken
     * @return string
     * @throws ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function post(string $path, ?array $params)
    {
        try {
            return $this->send($path, 'POST', $params)->getContent();
        } catch (ClientExceptionInterface $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }
}