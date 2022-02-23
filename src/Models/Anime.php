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
    public function __construct(object $anime = null)
    {
        if ($anime){
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

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $russian
     */
    public function setRussian(?string $russian): void
    {
        $this->russian = $russian;
    }

    /**
     * @param Image $image
     */
    public function setImage(Image $image): void
    {
        $this->image = $image;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param string $kind
     */
    public function setKind(string $kind): void
    {
        $this->kind = $kind;
    }

    /**
     * @param float $score
     */
    public function setScore(float $score): void
    {
        $this->score = $score;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @param int $episodes
     */
    public function setEpisodes(int $episodes): void
    {
        $this->episodes = $episodes;
    }

    /**
     * @param int $episodesAired
     */
    public function setEpisodesAired(int $episodesAired): void
    {
        $this->episodesAired = $episodesAired;
    }

    /**
     * @param string $airedOn
     */
    public function setAiredOn(string $airedOn): void
    {
        $this->airedOn = $airedOn;
    }

    /**
     * @param string|null $releasedOn
     */
    public function setReleasedOn(?string $releasedOn): void
    {
        $this->releasedOn = $releasedOn;
    }

    /**
     * @param string|null $rating
     */
    public function setRating(?string $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @param array|null $english
     */
    public function setEnglish(?array $english): void
    {
        $this->english = $english;
    }

    /**
     * @param array|null $japanese
     */
    public function setJapanese(?array $japanese): void
    {
        $this->japanese = $japanese;
    }
}