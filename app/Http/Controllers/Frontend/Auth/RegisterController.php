<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Repositories\User\UserRepositoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class RegisterController SPA認証
 * @package App\Http\Controllers\Frontend\Auth
 */
class RegisterController extends Controller
{
    private UserRepositoryContract $userRepository;

    /**
     * @param UserRepositoryContract $userRepository
     */
    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * ユーザー登録API
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        DB::transaction(function () use ($request) {
            $this->userRepository->createUser(
                $request->getName(),
                $request->getEmail(),
                $request->getPassword()
            );
        });
        return response()->json();
    }
}
