<?php

namespace App\User\Domain\Entity;

use App\User\Domain\ValueObject\Email;

final class User
{
    public function __construct(
        private readonly string $id,
        private readonly string $firstname,
        private readonly string $lastname,
        private readonly Email  $email,
        private readonly string $passwordHash,
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }
}
