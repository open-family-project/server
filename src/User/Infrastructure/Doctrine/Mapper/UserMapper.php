<?php

namespace App\User\Infrastructure\Doctrine\Mapper;

use App\User\Domain\Entity\User;
use App\User\Domain\ValueObject\Email;

class UserMapper
{
    /**
     * @param array<string, mixed> $row
     */
    public function map(array $row): User
    {
        assert(is_int($row['id']));
        assert(is_string($row['firstname']));
        assert(is_string($row['lastname']));
        assert(is_string($row['email']));
        assert(is_string($row['password_hash']));

        return new User(
            id: $row['id'],
            firstname: $row['firstname'],
            lastname: $row['lastname'],
            email: new Email($row['email']),
            passwordHash: $row['password_hash'],
        );
    }
}
