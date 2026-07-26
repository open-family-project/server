<?php

namespace App\Auth\Application\UseCase;

use App\Auth\Domain\Exception\InvalidCredentialsException;
use App\Auth\Domain\Service\PasswordHasherInterface;
use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\ValueObject\Email;

final class AuthenticateUserUseCase
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
        private readonly PasswordHasherInterface $passwordVerifier,
    )
    {
    }

    public function execute(
        Email  $email,
        string $password,
    ): User
    {
        $user = $this->userRepository->findOneByEmail($email);

        if ($user === null) {
            throw new InvalidCredentialsException();
        }

        if (!$this->passwordVerifier->verify($password, $user->getPasswordHash())) {
            throw new InvalidCredentialsException();
        }

        return $user;
    }
}
