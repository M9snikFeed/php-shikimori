<?php

namespace M9snikfeed\PhpShikimori\Models;

use M9snikfeed\PhpShikimori\Traits\Parser;

class Role
{
    use Parser;

    /**
     * @var array
     */
    private array $roles;

    /**
     * @var array|null
     */
    private ?array $roles_russian;

    /**
     * @var Character|null
     */
    private ?Character $character;

    /**
     * @var Person|null
     */
    private ?Person $person;

    /**
     * @param object $role
     */
    public function __construct(object $role)
    {
        $this->roles = $role->roles;
        $this->roles_russian = $role->roles_russian;
        $this->character = $role->character ? new Character((object) $role->character) : null;
        $this->person = $role->person ? new Person((object) $role->person) : null;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @return array|null
     */
    public function getRolesRussian(): ?array
    {
        return $this->roles_russian;
    }

    /**
     * @return Character|null
     */
    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    /**
     * @return Person|null
     */
    public function getPerson(): ?Person
    {
        return $this->person;
    }
}