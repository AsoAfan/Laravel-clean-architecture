<?php

namespace Application\User\Interfaces;

use Application\User\DTOs\RegisterUserDTO;
use Domain\User\Entities\UserEntity;
use Domain\User\ValueObjects\Email;

interface UserRepositoryInterface
{
    public function findByEmail(Email $email): ?UserEntity;

    public function findById(int $id): ?UserEntity;

    public function create(RegisterUserDTO $dto): UserEntity;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
