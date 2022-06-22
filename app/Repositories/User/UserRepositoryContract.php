<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\Params\UpdateUserParams;

interface UserRepositoryContract
{

    /**
     * ユーザー登録
     * @param string $name
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public function createUser(string $name, string $email, string $password);

    /**
     * ユーザー取得
     * @param int $userId
     * @return mixed
     */
    public function findUser(int $userId);

    /**
     * ユーザー情報更新
     * @param User $user
     * @param UpdateUserParams $params
     * @return mixed
     */
    public function updateUser(User $user, UpdateUserParams $params);
}
