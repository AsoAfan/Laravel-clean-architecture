<?php

namespace Application\User\UseCases;

use Application\User\DTOs\RegisterUserDTO;
use Application\User\Interfaces\PasswordHasher;
use Application\User\Interfaces\UserRepositoryInterface;
use Domain\User\Entities\UserEntity;

readonly class RegisterUser
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private PasswordHasher $passwordHasher,
    ) {}

    public function execute(RegisterUserDTO $registerUserDTO): UserEntity
    {
        return $this->userRepository->create([
            'name' => $registerUserDTO->name,
            'email' => $registerUserDTO->email,
            'password' => $this->passwordHasher->hash($registerUserDTO->password),
        ]);
    }
}
