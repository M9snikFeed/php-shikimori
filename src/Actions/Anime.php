<?php

namespace M9snikfeed\PhpShikimori\Actions;

use M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest;
use M9snikfeed\PhpShikimori\Enums\anime\Status;
use M9snikfeed\PhpShikimori\Enums\anime\Kind;
use M9snikfeed\PhpShikimori\Enums\anime\Duration;
use M9snikfeed\PhpShikimori\Models\Anime as AnimeModel;
use M9snikfeed\PhpShikimori\Models\Anime\Franchise as FranchiseModel;
use M9snikfeed\PhpShikimori\Models\ExternalLink as ExternalLinkModel;
use M9snikfeed\PhpShikimori\Models\Role as RoleModel;
use M9snikfeed\PhpShikimori\Models\Related as RelatedModel;
use M9snikfeed\PhpShikimori\Models\Screenshot as ScreenshotModel;
use M9snikfeed\PhpShikimori\Traits\Parser;

class Anime extends BaseAction
{
    use Parser;

    /**
     * @var ShikimoriApiRequest
     */
    private ShikimoriApiRequest $request;

    /**
     * @param ShikimoriApiRequest $request
     */
    public function __construct(ShikimoriApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Get anime list.
     * @throws \M9snikfeed\PhpShikimori\Exceptions\ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @param array $params
     * - @var integer page. Must be a number between 1 and 100000.
     * @var integer limit. Must be a number, maximum 50.
     * @var string order. Must be one of: id, ranked, kind, popularity, name, aired_on, episodes, status, random.
     * @var Kind kind. Must be one of: tv, movie, ova, ona, special, music, tv_13, tv_24, tv_48.
     * @var Status status. Must be one of: anons, ongoing, released.
     * @var string season. Examples: summer_2017, 2016, 2014_2016, 199x.
     * @var integer score. Must be a number.
     * @var Duration duration. Must be one of: S, D, F.
     * @var string rating. Must be one of: none, g, pg, pg_13, r, r_plus, rx.
     * @var string genres. List of genre ids separated by comma.
     * @var string studio. List of studio ids separated by comma.
     * @var string franchise. List of genre ids separated by comma.
     * @var boolean censored. Set too false to allow hentai, yaoi and yuri. Must be one of: true, false.
     * @var string myList. Must be one of: planned, watching, rewatching, completed, on_hold, dropped.
     * @var string ids. List of anime ids separated by comma.
     * @var string exclude_ids. List of anime ids separated by comma.
     * @var string search. Search phrase to filter animes by name. Must be a String.
     */
    public function list(array $params = [])
    {
        return $this->toObjectsList(
            (object) $this->request->get('animes', $this->formatParams($params)),
            AnimeModel::class,
        );
    }

    /**
     * Get anime item.
     * @param int $id
     * @return AnimeModel
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \M9snikfeed\PhpShikimori\Exceptions\ApiRequestException
     */
    public function get(int $id): AnimeModel
    {
        return new AnimeModel((object) $this->request->get('animes/' . $id));
    }

    /**
     * Get anime roles.
     * @param int $id anime id
     * @return array
     * @throws \M9snikfeed\PhpShikimori\Exceptions\ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getRolesWithAnimeId(int $id): array
    {
        return $this->toObjectsList(
            (object) $this->request->get('animes/' . $id . '/roles'),
            RoleModel::class,
        );
    }

    /**
     * Get anime similar.
     * @param int $id anime id
     * @return array
     * @throws \m9snikfeed\phpShikimori\exceptions\ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getSimilarWithAnimeId(int $id): array
    {
        return $this->toObjectsList(
            (object) $this->request->get('animes/' . $id . '/similar'),
            AnimeModel::class,
        );
    }

    /**
     * Get list related anime.
     * @param int $id anime id
     * @return array
     * @throws \M9snikfeed\PhpShikimori\Exceptions\ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getRelatedWithAnimeId(int $id): array
    {
        return $this->toObjectsList(
            (object) $this->request->get('animes/' . $id . '/related'),
            RelatedModel::class,
        );
    }

    /**
     * Get anime screenshots.
     * @param int $id anime id
     * @return array
     * @throws \M9snikfeed\PhpShikimori\Exceptions\ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getScreenshotsWithAnimeId(int $id): array
    {
        return $this->toObjectsList(
            (object) $this->request->get('animes/' . $id . '/screenshots'),
            ScreenshotModel::class,
        );
    }

    /**
     * Get anime franchise.
     * @param int $id anime id
     * @return FranchiseModel
     * @throws \M9snikfeed\PhpShikimori\Exceptions\ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getFranchiseWithAnimeId(int $id): FranchiseModel
    {
       return new FranchiseModel((object) $this->request->get('animes/' . $id . '/franchise'));
    }

    /**
     * Get anime external links.
     * @param int $id anime id
     * @return array
     * @throws \M9snikfeed\PhpShikimori\Exceptions\ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getExternalLinksWithAnimeId(int $id): array
    {
        return $this->toObjectsList(
            (object) $this->request->get('animes/' . $id . '/external_links'),
            ExternalLinkModel::class,
        );
    }

    /**
     * Get anime topics.
     * @param int $id anime id
     * @param array $params
     *  - @var integer page. Must be a number between 1 and 100000.
     *  - @var integer limit. Must be a number, 30 maximum.
     *  - @var Kind kind.
     *  - @var integer episode. Must be a number.
     * @return array
     * @throws \m9snikfeed\phpShikimori\exceptions\ApiRequestException
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getTopicsWithAnimeId(int $id, array $params = []): array
    {
        return $this->request->get('animes/' . $id . '/topics', $params);
    }
}