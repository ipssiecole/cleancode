<?php

namespace Ipssi;

class User
{
    const VISITOR = 1;
    const EDITOR = 2;
    const MANAGER = 4;
    const ADMIN = 8;

    private $whiteList = array(
        self::VISITOR,
        self::EDITOR,
        self::MANAGER,
        self::ADMIN,
    );

    private $role = self::VISITOR;

    public function setRole(int $role): User
    {
        $roles = array_sum($this->whiteList);
        if ($role > $roles) {
            throw new \InvalidArgumentException('invalid role');
        }

        $this->role = $role;
        return $this;
    }

    public function getRole(): int
    {
        return $this->role;
    }
}
