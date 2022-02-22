<?php

namespace M9snikfeed\PhpShikimori\Actions;

use M9snikfeed\PhpShikimori\Models\User\User;

class Users extends BaseAction
{
    public function whoami()
    {
        $data = $this->request->get('users/whoami');
        return new User((object) $data);
    }
}