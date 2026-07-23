<?php

namespace App\User\Infrastructure\Doctrine\Mapper;

use App\User\Domain\Entity\User;
use App\User\Domain\ValueObject\Email;

class UserMapper
{
    public function map(array $row): User
    {
        return new User(
            id: (int) $row['id'],
            firstname: $row['firstname'],
            lastname: $row['lastname'],
            email: new Email($row['email']),
            passwordHash: $row['password_hash'],
        );
    }
}
