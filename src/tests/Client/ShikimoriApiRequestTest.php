<?php

namespace M9snikfeed\PhpShikimori\Tests\Client;

use M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest;
use PHPUnit\Framework\TestCase;

class ShikimoriApiRequestTest extends TestCase
{

    protected $request;

    public function setUp(): void
    {
        $this->request = new ShikimoriApiRequest('https://shikimori.one', 'api-test');
    }

    /**
     * @return void
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \m9snikfeed\phpShikimori\exceptions\ApiRequestException
     * @covers \M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest
     */
    public function testRequest(){
        $data = $this->request->get('/api/animes/1');
        $this->assertNotEmpty($data);
    }
}