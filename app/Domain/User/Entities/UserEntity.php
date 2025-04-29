<?php

namespace Domain\User\Entities;

use Domain\User\ValueObjects\Email;
use Infrastructure\Persistence\User\Models\User;

class UserEntity
{
    public function __construct(
        public ?int $id,
        public ?string $name,
        public Email $email,
        public ?string $emailVerifiedAt = null,
        public ?string $createdAt = null,
    ) {}

    /**
     * Check if the user is verified.
     */
    public function isVerified(): bool
    {
        return ! is_null($this->emailVerifiedAt);
    }

    /**
     * Create a new instance from a User model.
     */
    public static function fromModel(User $user): static
    {
        return new static(
            id: $user->id,
            name: $user->name,
            email: new Email($user->email),
            createdAt: $user->created_at,
        );
    }
}
