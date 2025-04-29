<?php

namespace Application\User\UseCases;

use Application\User\DTOs\LoginUserDTO;
use Application\User\Interfaces\UserRepositoryInterface;
use Domain\User\Entities\UserEntity;
use Domain\User\Services\LoginPolicyService;

readonly class LoginUser
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private LoginPolicyService      $loginPolicyService,

    ) {}

    /**
     * @throws Exception
     */
    public function execute(LoginUserDTO $dto): UserEntity
    {

        // Validate the user credentials
        $user = $this->userRepository->findByEmail($dto->email);

        if (! $user) {
            throw new Exception('User not found');
        }

        if (! password_verify($dto->password, $user->password)) {
            throw new Exception('Invalid password');
        }

        // Check if the user is verified
        if (! $this->loginPolicyService->canLogin($user)) {
            throw new Exception('User is not verified');
        }

        return $user;

    }
}
