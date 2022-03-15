<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Password implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        // アルファベット大文字・小文字・数字・記号(!@#$%^&*()+=)で構成されているかチェック
        if (preg_match('/\A[a-zA-Z\d!@#$%^&*()+=]{8,32}\z/', $value) === false) {
            return false;
        }
        $count = collect([
            preg_match('/\A(?=.*?[a-z])[a-zA-Z\d!@#$%^&*()+=]{8,32}\z/', $value), //a-zを含んでいるかどうか
            preg_match('/\A(?=.*?[A-Z])[a-zA-Z\d!@#$%^&*()+=]{8,32}\z/', $value), //A-Zを含んでいるかどうか
            preg_match('/\A(?=.*?\d)[a-zA-Z\d!@#$%^&*()+=]{8,32}\z/', $value),    //0-9を含んでいるかどうか
            preg_match('/\A(?=.*?[!@#$%^&*()+=])[a-zA-Z\d!@#$%^&*()+=]{8,32}\z/', $value), //記号を含んでいるかどうか
        ])->reduce(fn($reducer, $matchResult) => $reducer + $matchResult, 0);

        return $count >= 3;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return trans('validation.new_password');
    }
}
