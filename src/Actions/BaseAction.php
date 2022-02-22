<?php

namespace M9snikfeed\PhpShikimori\Actions;

use M9snikfeed\PhpShikimori\Client\ShikimoriApiRequest;
use phpDocumentor\Reflection\Types\ClassString;

class BaseAction
{
    /**
     * @var ShikimoriApiRequest
     */
    protected ShikimoriApiRequest $request;

    /**
     * @param ShikimoriApiRequest $request
     */
    public function __construct(ShikimoriApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Formats given array of parameters for making the request.
     * @param array $params
     * @return array
     */
    protected function formatParams(array $params = []): array
    {
        if (empty($params)){
            return $params;
        }

        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $params[$key] = implode(',', $value);
            } else if (is_bool($value)) {
                $params[$key] = $value ? 1 : 0;
            }
        }

        return $params;
    }

}