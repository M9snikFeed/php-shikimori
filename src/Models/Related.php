<?php

namespace M9snikfeed\PhpShikimori\Models;

class Related
{
    /**
     * @var string
     */
    private string $relation;

    /**
     * @var string
     */
    private string $relation_russian;

    /**
     * @var Anime
     */
    private Anime $anime;

    /**
     * @param object $related
     */
    public function __construct(object $related)
    {
        $this->relation = $related->relation;
        $this->relation_russian = $related->relation_russian;
        $this->anime = new Anime((object) $related->anime);
    }

    /**
     * @return string
     */
    public function getRelation(): string
    {
        return $this->relation;
    }

    /**
     * @return string
     */
    public function getRelationRussian(): string
    {
        return $this->relation_russian;
    }

    /**
     * @return Anime
     */
    public function getAnime(): Anime
    {
        return $this->anime;
    }
}