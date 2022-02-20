<?php

namespace M9snikfeed\PhpShikimori\Models;

class Anime
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $name;


    /**
     * @var string|null
     */
    private ?string $russian;

    /**
     * @var Image
     */
    private Image $image;

    /**
     * @var string
     */
    private string $url;


    /**
     * @var string
     */
    private string $kind;


    /**
     * @var float
     */
    private float $score;


    /**
     * @var string
     */
    private string $status;


    /**
     * @var int
     */
    private int $episodes;


    /**
     * @var int
     */
    private int $episodesAired;

    /**
     * @var string
     */
    private string $airedOn;

    /**
     * @var string|null
     */
    private ?string $releasedOn;

    /**
     * @var string|null
     */
    private ?string $rating;

    /**
     * @var array|null
     */
    private ?array $english;

    /**
     * @var array|null
     */
    private ?array $japanese;

    /**
     * @param object $anime
     */
    public function __construct(object $anime)
    {
        $this->id = $anime->id;
        $this->name = $anime->name;
        $this->russian = $anime->russian;
        $this->image = new Image((object) $anime->image);
        $this->url = $anime->url;
        $this->kind = $anime->kind;
        $this->score = $anime->score;
        $this->status = $anime->status;
        $this->episodes = $anime->episodes;
        $this->episodesAired = $anime->episodes_aired;
        $this->airedOn = $anime->aired_on;
        $this->rating = $anime->rating;
        $this->english = $anime->english;
        $this->japanese = $anime->japanese;
        $this->releasedOn = $anime->released_on;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRussian(): string
    {
        return $this->russian;
    }

    /**
     * @return Image
     */
    public function getImage(): Image
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * @return float
     */
    public function getScore(): float
    {
        return $this->score;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getEpisodes(): int
    {
        return $this->episodes;
    }

    /**
     * @return int
     */
    public function getEpisodesAired(): int
    {
        return $this->episodesAired;
    }

    /**
     * @return string
     */
    public function getAiredOn(): string
    {
        return $this->airedOn;
    }

    /**
     * @return string
     */
    public function getReleasedOn(): string
    {
        return $this->releasedOn;
    }

    /**
     * @return string|null
     */
    public function getRating(): ?string
    {
        return $this->rating;
    }

    /**
     * @return array|null
     */
    public function getEnglish(): ?array
    {
        return $this->english;
    }

    /**
     * @return array|null
     */
    public function getJapanese(): ?array
    {
        return $this->japanese;
    }
}