<?php

namespace App\Auth\Application\Presenter;

use App\Auth\Domain\Service\TokenGeneratorInterface;
use App\User\Domain\Entity\User;

class UserToJwtArrayPresenter
{
    public function __construct(
        private TokenGeneratorInterface $tokenGenerator,
    )
    {
    }

    /**
     * @return array<string,string>
     */
    public function present(User $user): array
    {
        $token = $this->tokenGenerator->generateFromUser($user);

        return [
            'access_token' => $token->accessToken,
            'refresh_token' => $token->refreshToken,
        ];
    }
}
