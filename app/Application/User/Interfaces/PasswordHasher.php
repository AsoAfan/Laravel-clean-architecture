<?php

namespace Application\User\Interfaces;

interface PasswordHasher
{
    public function hash(string $password): string;

    public function verify(string $password, string $hash): bool;
}
