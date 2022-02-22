<?php

namespace M9snikfeed\PhpShikimori\Tests\Actions;

use M9snikfeed\PhpShikimori\Client\ShikimoriApiClient;
use M9snikfeed\PhpShikimori\Exceptions\ApiRequestException;
use M9snikfeed\PhpShikimori\Models\Anime;
use M9snikfeed\PhpShikimori\Models\Image;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class AnimeTest extends TestCase
{
    /**
     * @var ShikimoriApiClient
     */
    private ShikimoriApiClient $client;

    public function setUp(): void
    {
        $this->client = new ShikimoriApiClient('php-shikimori-sdk');
    }

    /**
     * @return void
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \m9snikfeed\phpShikimori\exceptions\ApiRequestException
     * @covers ShikimoriApiClient:anime()
     */
    public function testGetAnime()
    {
        $anime = $this->client->anime()->get(1);
        $this->assertInstanceOf(Anime::class, $anime);
        $this->assertInstanceOf(Image::class, $anime->getImage());

        $this->assertEquals('Cowboy Bebop', $anime->getName());
        $this->assertEquals('Ковбой Бибоп', $anime->getRussian());
        $this->assertEquals('/animes/1-cowboy-bebop', $anime->getUrl());
        $this->assertEquals('tv', $anime->getKind());
        $this->assertIsFloat($anime->getScore());
        $this->assertEquals('released', $anime->getStatus());
        $this->assertEquals(26, $anime->getEpisodes());
        $this->assertEquals(0, $anime->getEpisodesAired());
        $this->assertEquals('1998-04-03', $anime->getAiredOn());
        $this->assertEquals('1999-04-24', $anime->getReleasedOn());
        $this->assertEquals('r_plus', $anime->getRating());
        $this->assertIsArray($anime->getEnglish());
        $this->assertIsArray($anime->getJapanese());
    }

    /**
     * @return void
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @covers \M9snikfeed\PhpShikimori\Actions\Anime:get()
     */
    public function testAnimeNotFound()
    {
        try {
            $anime = $this->client->anime()->get(2);
        } catch (ApiRequestException $e) {
            $this->assertSame($e->getCode(), 404);
        }
    }
}