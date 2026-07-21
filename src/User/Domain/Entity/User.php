<?php

namespace App\User\Domain\Entity;

use App\User\Domain\ValueObject\Email;

final class User
{
    public function __construct(
        private readonly string $id,
        private readonly Email  $email,
        private readonly string $passwordHash,
    )
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function passwordHash(): string
    {
        return $this->passwordHash;
    }
}
