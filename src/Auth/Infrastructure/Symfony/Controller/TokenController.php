<?php

namespace App\Auth\Infrastructure\Symfony\Controller;

use App\Auth\Application\Presenter\UserToJwtArrayPresenter;
use App\Auth\Application\UseCase\AuthenticateUserUseCase;
use App\User\Domain\ValueObject\Email;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TokenController
{
    public function __construct(
        private AuthenticateUserUseCase $useCase,
        private UserToJwtArrayPresenter $presenter,
    ) {
    }

    #[Route('/token', name: 'app_auth_token', methods: ['POST'])]
    public function index(Request $request): Response
    {
        $data = $request->toArray();

        $user = $this->useCase->execute(
            new Email($data['email']),
            $data['password'],
        );

        return new JsonResponse($this->presenter->present($user));
    }
}
