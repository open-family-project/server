<?php

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HealthController
{
    #[Route('/', name: 'app_api_health')]
    public function index(): Response
    {
        return new JsonResponse([
            'success' => true,
        ]);
    }
}
