<?php

namespace M9snikfeed\PhpShikimori\Models\Anime;

use M9snikfeed\PhpShikimori\Traits\Parser;

class Franchise
{
    use Parser;

    private ?array $links;

    private ?array $nodes;

    public function __construct(object $franchise)
    {
        $this->nodes = $franchise->nodes ? $this->toObjectsList((object) $franchise->nodes, Node::class) : null;
        $this->links = $franchise->links ? $this->toObjectsList((object) $franchise->links, Link::class) : null;
    }
}