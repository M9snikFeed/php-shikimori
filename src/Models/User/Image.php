<?php

namespace M9snikfeed\PhpShikimori\Models\User;

class Image
{
    private $x160;
    private $x148;
    private $x80;
    private $x64;
    private $x48;
    private $x32;
    private $x16;

    public function __construct(object $image)
    {
        if ($image){
           $this->x80 = $image->x80;
           $this->x64 = $image->x64;
           $this->x48 = $image->x48;
           $this->x32 = $image->x32;
           $this->x16 = $image->x16;
        }
    }
}