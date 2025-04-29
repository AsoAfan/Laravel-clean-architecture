<?php

namespace Application\User\DTOs;

use Domains\User\ValueObjects\Email;
use Illuminate\Support\Collection;

class LoginUserDTO
{
    public function __construct(
        public Email $email,
        public string $password,
    ) {}

    public static function fromRequest(Collection $body): self
    {
        return new self(
            email: new Email($body->get('email')),
            password: $body->get('password'),
        );
    }
}
