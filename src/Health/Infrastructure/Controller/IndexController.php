<?php

namespace App\Health\Infrastructure\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController
{
    #[Route('/', name: 'app_health_index')]
    public function index(): Response
    {
        return new JsonResponse([
            'success' => true,
        ]);
    }
}
