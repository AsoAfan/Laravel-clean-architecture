<?php

namespace Application\User\DTOs;

use Domain\User\ValueObjects\Email;
use Illuminate\Support\Collection;

class RegisterUserDTO
{
    public function __construct(
        public string $name,
        public Email $email,
        public string $password,
    ) {}

    public static function fromRequest(Collection $body): self
    {
        return new self(
            name: $body->get('name'),
            email: new Email($body->get('email')),
            password: $body->get('password'),
        );
    }
}
