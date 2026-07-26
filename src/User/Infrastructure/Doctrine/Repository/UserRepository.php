<?php

namespace App\User\Infrastructure\Doctrine\Repository;

use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\ValueObject\Email;
use App\User\Infrastructure\Doctrine\Mapper\UserMapper;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private Connection $connection,
        private UserMapper $mapper,
    ) {
    }

    public function findOneByEmail(Email $email): ?User
    {
        try {
            $result =  $this->connection->createQueryBuilder()
                ->select('id', 'firstname', 'lastname', 'email', 'password_hash')
                ->from('users')
                ->where('email = :email')
                ->setParameter('email', $email->value())
                ->setMaxResults(1)
                ->executeQuery()
                ->fetchAssociative();

            return !!$result ? $this->mapper->map($result) : null;
        } catch (Exception $dbalException) {
            return null;
        }
    }
}
