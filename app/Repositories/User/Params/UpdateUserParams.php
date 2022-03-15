<?php

namespace App\Repositories\User\Params;

/**
 * Class UpdateUserParams ユーザー情報更新
 * @package App\Repositories\User\Params
 */
class UpdateUserParams
{
    /**
     * ユーザー名
     * @var string
     */
    private string $name;

    /**
     * メールアドレス
     * @var string
     */
    private string $email;

    /**
     * プロフィール画像
     * @var string
     */
    private string $profile_image;

    /**
     * 職場
     * @var string
     */
    private string $work_place;

    /**
     * 職業
     * @var string
     */
    private string $occupation;


    /**
     * UpdateUserParams constructor.
     * @param string $name
     * @param string $email
     * @param string $profile_image
     * @param string $work_place
     * @param string $occupation
     */
    public function __construct(
        string $name,
        string $email,
        string $profile_image,
        string $work_place,
        string $occupation
    ){
        $this->name = $name;
        $this->email = $email;
        $this->profile_image = $profile_image;
        $this->work_place = $work_place;
        $this->occupation = $occupation;
    }

    /**
     * 保存用の配列
     * @return array
     */
    public function toArray():array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'profile_image_name' => $this->profile_image,
            'work_place' => $this->work_place,
            'occupation' => $this->occupation,
        ];
    }

}
