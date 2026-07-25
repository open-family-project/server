<?php

namespace App\Auth\Domain\Entity;

class Token
{
    public function __construct(
        public string $accessToken,
        public string $refreshToken,
    )
    {
    }
}
