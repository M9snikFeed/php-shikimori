<?php

namespace M9snikfeed\PhpShikimori\Tests\Actions;

use M9snikfeed\PhpShikimori\Exceptions\ApiRequestException;
use M9snikfeed\PhpShikimori\Models\Anime;
use M9snikfeed\PhpShikimori\Actions\Anime as AnimeModel;
use M9snikfeed\PhpShikimori\Models\Image;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class AnimeTest extends TestCase
{
    /**
     * @var \M9snikfeed\PhpShikimori\Actions\Anime
     */
    private AnimeModel $animeAction;

    private MockObject $request;

    public function setUp(): void
    {
        $this->request = $this->getMockBuilder('M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest')
            ->setConstructorArgs(['https://shikimori.one/api/', 'test-api'])->getMock();

        $this->animeAction = new AnimeModel($this->request);
    }

    /**
     * @return void
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \m9snikfeed\phpShikimori\exceptions\ApiRequestException
     * @covers \M9snikfeed\PhpShikimori\Actions\Anime->get()
     */
    public function testGetAnime()
    {
        $json = json_decode(file_get_contents(__DIR__ . '/../Data/anime_1.json'));
        $this->request->method('get')->willReturn((array) $json);
        $this->request->expects($this->once())->method('get');

        $animeData = $this->animeAction->get(1);
        $this->assertInstanceOf(Anime::class, $animeData);
        $this->assertInstanceOf(Image::class, $animeData->getImage());
        $this->assertEquals('Cowboy Bebop', $animeData->getName());
        $this->assertEquals('Ковбой Бибоп', $animeData->getRussian());
        $this->assertEquals('/animes/1-cowboy-bebop', $animeData->getUrl());
        $this->assertEquals('tv', $animeData->getKind());
        $this->assertIsFloat($animeData->getScore());
        $this->assertEquals('released', $animeData->getStatus());
        $this->assertEquals(26, $animeData->getEpisodes());
        $this->assertEquals(0, $animeData->getEpisodesAired());
        $this->assertEquals('1998-04-03', $animeData->getAiredOn());
        $this->assertEquals('1999-04-24', $animeData->getReleasedOn());
        $this->assertEquals('r_plus', $animeData->getRating());
        $this->assertIsArray($animeData->getEnglish());
        $this->assertIsArray($animeData->getJapanese());
    }

    /**
     * @return void
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @covers \M9snikfeed\PhpShikimori\Actions\Anime->get()
     */
    public function testAnimeNotFound()
    {
        try {
            $this->request->method('get')->willThrowException(new ApiRequestException(code: 404));
            $this->animeAction->get(2);
        } catch (ApiRequestException $e) {
            $this->assertSame($e->getCode(), 404);
        }
    }
}