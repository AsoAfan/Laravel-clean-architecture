<?php

namespace Domain\User\Services;

use Domain\User\Entities\UserEntity;

readonly class LoginPolicyService
{
    public function __construct(
        private int $maxAttempts = 5,
        private int $decayMinutes = 1,
    ) {}

    public function getMaxAttempts(): int
    {
        return $this->maxAttempts;
    }

    public function getDecayMinutes(): int
    {
        return $this->decayMinutes;
    }

    public function canLogin(UserEntity $entity): bool
    {
        return $entity->isVerified();
    }
}
