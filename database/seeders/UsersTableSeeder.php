<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'moderator',
                'email' => 'moderator@moderator.com',
                'password' => Hash::make('moderator'),
            ],
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('user'),
            ]
        ]);
    }
}
