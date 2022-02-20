<?php

namespace M9snikfeed\PhpShikimori\OAuth\Enum;

enum Scopes
{
    case user_rates;
    case messages;
    case comments;
    case topics;
    case content;
    case clubs;
    case friends;
    case ignores;
}