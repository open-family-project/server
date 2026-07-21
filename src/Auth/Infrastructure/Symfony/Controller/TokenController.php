<?php

namespace App\Auth\Infrastructure\Symfony\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TokenController
{
    #[Route('/token', name: 'app_auth_token')]
    public function index(): Response
    {
        return new JsonResponse([
            'access_token' => '123456789',
            'refresh_token' => '123456789abc',
        ]);
    }
}
