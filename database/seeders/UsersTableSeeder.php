<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('Admin-1122'),
            ],
        ];

        foreach ($users as $user) {
            if (User::query()->where('email', $user["email"])->exists()) {
                continue;
            }
        }
    }
}
