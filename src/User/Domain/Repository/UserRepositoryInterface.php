<?php

namespace App\User\Domain\Repository;

use App\User\Domain\Entity\User;
use App\User\Domain\ValueObject\Email;

interface UserRepositoryInterface
{
    public function findOneByEmail(Email $email): ?User;
}
