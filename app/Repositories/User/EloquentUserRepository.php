<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\Params\UpdateUserParams;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepositoryContract
{
    /**
     * @inheritDoc
     */
    public function createUser(string $name, string $email, string $password)
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function findUser(int $userId): User
    {
        return User::findOrFail($userId);
    }

    /**
     * @inheritDoc
     */
    public function updateUser(User $user, UpdateUserParams $params): User
    {
        $user->update($params->toArray());
        return $user;
    }
}
