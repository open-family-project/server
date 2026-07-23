<?php

namespace App\Auth\Infrastructure\Security;

use App\Auth\Domain\Service\PasswordHasherInterface;

class NativePasswordHasher implements PasswordHasherInterface
{
    public function hash(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    public function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

}
