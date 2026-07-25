<?php

namespace App\Auth\Domain\Service;

use App\Auth\Domain\Entity\Token;
use App\User\Domain\Entity\User;

interface TokenGeneratorInterface
{
    public function generateFromUser(User $user): Token;

    public function generate(string $subject, array $claims = []): Token;
}
