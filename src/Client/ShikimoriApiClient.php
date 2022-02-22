<?php

namespace M9snikfeed\PhpShikimori\Client;

use M9snikfeed\PhpShikimori\Actions\Anime;
use M9snikfeed\PhpShikimori\Actions\Users;

class ShikimoriApiClient
{
    protected const API_HOST = 'https://shikimori.one/api/';

    /**
     * @var string
     */
    private string $userAgent;

    /**
     * @var ShikimoriApiRequest
     */
    private ShikimoriApiRequest $request;

    private $achievements;

    /**
     * @var Anime
     */
    private $anime;

    private $appear;

    private $bans;

    private $calendars;

    private $characters;

    private $clubs;

    private $comments;

    private $constants;

    private $dialogs;

    private $favorites;

    private $forums;

    private $friends;

    private $genres;

    private $ignores;

    private $mangas;

    private $messages;

    private $people;

    private $publishers;

    private $ranobe;

    private $stats;

    private $studios;

    private $topics;

    private $userImages;

    private $userRates;

    private Users $users;

    private $videos;

    /**
     * @param string $userAgent
     */
    public function __construct(string $userAgent)
    {
        $this->userAgent = $userAgent;
        $this->request = new ShikimoriApiRequest(self::API_HOST, $userAgent);
    }

    /**
     * @return Anime
     */
    public function anime(): Anime
    {
        return $this->anime = new Anime($this->request);
    }

    /**
     * @return Users
     */
    public function users(): Users
    {
        return $this->users = new Users($this->request);
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->request->setAccessToken($accessToken);
    }
}