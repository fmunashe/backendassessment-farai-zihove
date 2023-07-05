<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //default password is password
        $users = [
            ['name' => "Admin", 'surname' => "Admin", 'email' => "admin@econet.co.zw", 'user_type' => UserTypeEnum::ADMIN, 'email_verified_at' => now(), 'password' => Config('auth.passwords.password'), 'remember_token' => Str::random(10)],
        ];

        foreach ($users as $user) {
            User::query()->updateOrCreate($user);
        }
    }
}
