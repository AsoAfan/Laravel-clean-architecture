<?php

namespace Infrastructure\Persistence\User;

use Application\User\DTOs\RegisterUserDTO;
use Application\User\Interfaces\UserRepositoryInterface;
use Domains\User\Entities\UserEntity;
use Domains\User\ValueObjects\Email;
use Infrastructure\Persistence\User\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function findByEmail(Email $email): ?UserEntity
    {
        $user = User::where('email', $email->get())->first();

        if ($user) {
            return UserEntity::fromModel($user);
        }

        return null;
    }

    public function findById(int $id): ?UserEntity
    {
        $user = User::find($id);

        if ($user) {
            return UserEntity::fromModel($user);
        }

        return null;
    }

    public function create(RegisterUserDTO $dto): UserEntity
    {

        $user = User::create([
            'name' => $dto->name,
            'email' => $dto->email->get(),
            'password' => $dto->password,
        ]);

        return UserEntity::fromModel($user);

    }

    public function update(int $id, array $data): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
}
