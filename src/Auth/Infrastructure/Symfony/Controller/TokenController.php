<?php

namespace App\Auth\Infrastructure\Symfony\Controller;

use App\Auth\Application\AuthenticateUserUseCase;
use App\User\Domain\ValueObject\Email;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TokenController
{
    #[Route('/token', name: 'app_auth_token')]
    public function __construct(
        private AuthenticateUserUseCase $useCase,
    ) {
    }

    #[Route('/token')]
    public function index(): Response
    {
        $user = $this->useCase->execute(
            new Email('john@example.com'),
            'password'
        );

        // création du token plus tard
    }
}
