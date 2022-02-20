<?php

namespace M9snikfeed\PhpShikimori\Models;


class Screenshot
{
    /**
     * @var string
     */
    private string $original;

    /**
     * @var string
     */
    private string $preview;

    /**
     * @param object $screenshot
     */
    public function __construct(object $screenshot)
    {
        $this->original = $screenshot->original;
        $this->preview = $screenshot->preview;
    }

    /**
     * @return string
     */
    public function getOriginal(): string
    {
        return $this->original;
    }

    /**
     * @return string
     */
    public function getPreview(): string
    {
        return $this->preview;
    }
}