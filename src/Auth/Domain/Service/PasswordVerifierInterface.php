<?php

namespace App\Auth\Domain\Service;

interface PasswordVerifierInterface
{
    public function verify(string $password, string $hash): bool;
}
