<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\LazyCollection;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = CarbonImmutable::now();
        $password = Hash::make('password');

        $data = LazyCollection::range(1, 10)
            ->map(fn(int $index) => [
                'id' => $index,
                'name' => "ユーザー{$index}",
                'email' => "user{$index}@example.com",
                'password' => $password,
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ])->all();

        DB::transaction(function () use ($data){
            User::insert($data);
        });
    }
}
