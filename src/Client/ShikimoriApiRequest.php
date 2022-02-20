<?php

namespace M9snikfeed\PhpShikimori\Client;

use M9snikfeed\PhpShikimori\Exceptions\ApiRequestException;
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

    protected const CONNECTION_TIMEOUT = 10;
    private const HTTP_STATUS_CODE_OK = 200;

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
     * @return ResponseInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */

    public function send(string $path, string $method = "GET", array $params = []): ResponseInterface
    {
        return $request = $this->СurlHttpClient->withOptions(
            [
                'headers' =>
                    [
                        'User-Agent' => $this->userAgent,
                    ]
            ]
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
     * @return array
     * @throws \m9snikfeed\phpShikimori\exceptions\ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function get($path, array $params = []): array
    {
        try {
            return $this->send($path, params: $params)->toArray();
        } catch (ClientExceptionInterface $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Post request
     * @return void
     */
    public function post()
    {

    }
}