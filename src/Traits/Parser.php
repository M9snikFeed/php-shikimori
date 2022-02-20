<?php

namespace m9snikfeed\phpShikimori\traits;

trait Parser
{
    /**
     * Returns a list of objects of a specific model.
     * @param object|array $list
     * @param $model
     * @return array
     */
    protected function toObjectsList(object|array $list, $model): array
    {
        $array = [];

        foreach ($list as $key => $item){
            $array[$key] = new $model((object) $item);
        }
        return $array;
    }
}