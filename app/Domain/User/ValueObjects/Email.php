<?php

namespace Domain\User\ValueObjects;

class Email
{
    private string $email;

    public function __construct(
        string $email,
    ) {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email address');
        }
        /*
         * If you want to enforce a maximum length for the email address
         * if (strlen($email) > 255) {
         * throw new \InvalidArgumentException('Email address is too long');
         * }
         */
        $this->email = strtolower($email);
    }

    public function get(): string
    {
        return $this->email;
    }

    public function equals(Email $email): bool
    {
        return $this->email === $email->get();
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
