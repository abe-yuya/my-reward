<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Providers\RouteServiceProvider;
use App\Repositories\User\UserRepositoryContract;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * ユーザー登録
 */
class RegisteredUserController extends Controller
{
    private UserRepositoryContract $userRepository;

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * ユーザー登録画面
     *
     * @return View
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * ユーザー登録
     *
     * @param RegisterUserRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $user = $this->userRepository->createUser(
            $request->getName(),
            $request->getEmail(),
            $request->getPassword()
        );

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
