<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        Role::create(['name' => 'reader']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'librarian']);
        Role::create(['name' => 'admin']);

        // Create Admin User
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@hon.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        // Create Librarian User
        $librarian = User::create([
            'name' => 'Librarian',
            'email' => 'librarian@hon.com',
            'password' => Hash::make('password'),
        ]);
        $librarian->assignRole('librarian');
    }
}
