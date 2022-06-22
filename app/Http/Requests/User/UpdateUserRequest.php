<?php

namespace App\Http\Requests\User;

use App\Repositories\User\Params\UpdateUserParams;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateUserRequest ユーザー情報更新リクエスト
 * @package App\Http\Requests\User
 */
class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profile_image' => ['nullable', 'mimes:jpg,jpeg,png,bmp', 'max:20000'],
            'work_place' => ['string', 'max:100'],
            'occupation' => ['string', 'max:100'],
        ];
    }

    /**
     * パラメーター返却
     * @return UpdateUserParams
     */
    public function getParams(): UpdateUserParams
    {
        return new UpdateUserParams(
            $this->input('name'),
            $this->input('email'),
            $this->input('profile_image'),
            $this->input('work_place'),
            $this->input('occupation'),
        );
    }

}
