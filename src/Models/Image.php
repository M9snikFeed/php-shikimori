<?php

namespace M9snikfeed\PhpShikimori\Models;

class Image
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
     * @var string
     */
    private string $x96;

    /**
     * @var string
     */
    private string $x48;

    /**
     * @param object $image
     */
    public function __construct(object $image)
    {
        $this->original = $image->original;
        $this->preview = $image->preview;
        $this->x96 = $image->x96;
        $this->x48 = $image->x48;
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

    /**
     * @return string
     */
    public function getX96(): string
    {
        return $this->x96;
    }

    /**
     * @return string
     */
    public function getX48(): string
    {
        return $this->x48;
    }
}