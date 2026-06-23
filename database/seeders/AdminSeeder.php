<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'dimas@pulaurempah.com'],
            [
                'name'     => 'dimas',
                'password' => Hash::make('dimas12345'),
                'role'     => 'admin',
            ]
        );
    }
}
