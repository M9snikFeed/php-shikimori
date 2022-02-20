<?php

namespace M9snikfeed\PhpShikimori\Models\Anime;

class Link
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var int
     */
    private int $source_id;

    /**
     * @var int
     */
    private int $target_id;

    /**
     * @var int
     */
    private int $source;

    /**
     * @var int
     */
    private int $target;

    /**
     * @var int
     */
    private int $weight;

    /**
     * @var string
     */
    private string $relation;

    /**
     * @param object $link
     */
    public function __construct(object $link)
    {
        $this->id = $link->id;
        $this->source = $link->source;
        $this->source_id = $link->source_id;
        $this->target_id = $link->target_id;
        $this->target = $link->target;
        $this->weight = $link->weight;
        $this->relation = $link->relation;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getSourceId(): int
    {
        return $this->source_id;
    }

    /**
     * @return int
     */
    public function getTargetId(): int
    {
        return $this->target_id;
    }

    /**
     * @return int
     */
    public function getSource(): int
    {
        return $this->source;
    }

    /**
     * @return int
     */
    public function getTarget(): int
    {
        return $this->target;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getRelation(): string
    {
        return $this->relation;
    }
}