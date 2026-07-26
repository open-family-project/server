<?php

namespace App\User\Infrastructure\Doctrine\Fixture;

use App\Auth\Domain\Service\PasswordHasherInterface;
use App\Shared\Infrastructure\Fixture\FixtureInterface;
use Doctrine\DBAL\Connection;

class UserFixture implements FixtureInterface
{
    public function __construct(
        private Connection              $connection,
        private PasswordHasherInterface $passwordHasher,
    )
    {
    }

    public function load(): void
    {
        $this->connection
            ->insert('users', [
                'firstname' => 'Admin Firstname',
                'lastname' => 'Admin Lastname',
                'email' => 'admin@example.com',
                'password_hash' => $this->passwordHasher->hash('password'),
            ]);
    }
}
