<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (blank($email) || blank($password)) {
            return;
        }

        $existingAdmin = Admin::where('email', $email)->first();
        if ($existingAdmin) {
            return;
        }

        Admin::create([
            'name' => env('ADMIN_NAME', 'Administrator'),
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }
}
