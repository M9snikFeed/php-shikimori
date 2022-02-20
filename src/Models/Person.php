<?php

namespace M9snikfeed\PhpShikimori\Models;

class Person
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
     * @param object $person
     */
    public function __construct(object $person)
    {
        $this->id = $person->id;
        $this->name = $person->name;
        $this->russian = $person->russian;
        $this->image = new Image((object) $person->image);
        $this->url = $person->url;
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
     * @return string|null
     */
    public function getRussian(): ?string
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
}