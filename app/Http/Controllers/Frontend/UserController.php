<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\User\UserRepositoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

/**
 * Class UserController ユーザー関連の操作
 * @package App\Http\Controllers\Frontend
 */
class UserController extends Controller
{
    private UserRepositoryContract $userRepository;

    /**
     * UserController constructor.
     * @param UserRepositoryContract $userRepository
     */
    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * ユーザー詳細
     * @param int $userId
     * @return JsonResponse
     */
    public function show(int $userId): JsonResponse
    {
        return response()->json($this->userRepository->findUser($userId));
    }

    /**
     * ユーザー情報更新
     * @param int $userId
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function update(int $userId, UpdateUserRequest $request): JsonResponse
    {
        $user = $this->userRepository->findUser($userId);

        DB::transaction(function() use($user, $request) {
           $this->userRepository->updateUser($user, $request->getParams());
        });

        return response()->json();
    }
}
