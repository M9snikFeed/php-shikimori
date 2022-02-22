<?php

namespace M9snikfeed\PhpShikimori\Tests\Client;

use M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest;
use M9snikfeed\PhpShikimori\Exceptions\ApiRequestException;
use PHPUnit\Framework\TestCase;

class ShikimoriApiRequestTest extends TestCase
{

    /**
     * @var ShikimoriApiRequest
     */
    protected ShikimoriApiRequest $request;

    public function setUp(): void
    {
        $this->request = new ShikimoriApiRequest('https://shikimori.one', 'api-test');
    }

    /**
     * @covers \M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest:constructor()
     */
    public function testConstructor(){
        $this->assertInstanceOf('\M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest', $this->request);
        $this->assertObjectHasAttribute('СurlHttpClient', $this->request);
        $this->assertObjectHasAttribute('host', $this->request);
        $this->assertObjectHasAttribute('userAgent', $this->request);
    }

    /**
     * @covers \M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest:get()
     * @covers \M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest:send()
     */
    public function testRequestNotEmpty()
    {
        $data = $this->request->get('/api/animes/1');
        $this->assertNotEmpty($data);
    }

    /**
     * @covers \M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest:get()
     * @covers \M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest:send()
     */
    public function testRequestNotFound()
    {
        try {
            $this->request->get('/api/animes/2');
        } catch (ApiRequestException $e) {
            $this->assertSame($e->getCode(), 404);
        }
    }
}