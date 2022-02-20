<?php

namespace M9snikfeed\PhpShikimori\Models;

class Character
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
    private string|null $russian;

    /**
     * @var Image
     */
    private Image $image;

    /**
     * @param object $character
     */
    public function __construct(object $character)
    {
        $this->id = $character->id;
        $this->name = $character->name;
        $this->russian = $character->russian;
        $this->image = new Image((object) $character->image);
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
}