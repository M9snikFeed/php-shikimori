<?php

namespace M9snikfeed\PhpShikimori\Models\Anime;

class Node
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var int
     */
    private int $date;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $image_url;

    /**
     * @var string
     */
    private string $url;

    /**
     * @var string
     */
    private string $year;

    /**
     * @var string
     */
    private string $kind;

    /**
     * @var string
     */
    private string $weight;

    /**
     * @param object $node
     */
    public function __construct(object $node)
    {
        $this->id = $node->id;
        $this->date = $node->date;
        $this->name = $node->name;
        $this->url = $node->url;
        $this->year = $node->year;
        $this->kind = $node->kind;
        $this->weight = $node->weight;
        $this->image_url = $node->image_url;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    /**
     * @param string $image_url
     */
    public function setImageUrl(string $image_url): void
    {
        $this->image_url = $image_url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param string $year
     */
    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     */
    public function setKind(string $kind): void
    {
        $this->kind = $kind;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    public function setWeight(string $weight): void
    {
        $this->weight = $weight;
    }
}