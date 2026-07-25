<?php

namespace App\Auth\Infrastructure\Security;

use App\Auth\Domain\Entity\Token;
use App\Auth\Domain\Service\TokenGeneratorInterface;
use App\User\Domain\Entity\User;
use Firebase\JWT\JWT;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class FirebaseJwtTokenGenerator implements TokenGeneratorInterface
{
    public function __construct(
        #[Autowire('%env(JWT_SECRET)%')]
        private string $secret,
    )
    {
    }

    public function generateFromUser(User $user): Token
    {
        return $this->generate($user->getId(), [
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'email' => $user->getEmail(),
        ]);
    }

    public function generate(string $subject, array $claims = []): Token
    {
        $iat = time();

        $payload = [
            'sub' => $subject,
            'iat' => $iat,
            ...$claims,
        ];

        $accessToken = JWT::encode([
            ...$payload,
            'exp' => $iat + 3600,
        ], $this->secret, 'HS256');

        $refreshToken = JWT::encode([
            ...$payload,
            'exp' => $iat + (86400 * 30),
        ], $this->secret, 'HS256');

        return new Token(
            $accessToken,
            $refreshToken,
        );
    }
}
