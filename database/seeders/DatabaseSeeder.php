<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Todo;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Query Builder
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        //     'is_admin' => true,
        // ]);

        // User Factory
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Dwiponco Suripto',
            'email' => 'dwiponcosuripto01@gmail.com',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Muhammad Davin Widyatmaka',
            'email' => 'davin@gmail.com',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Aldi Raihan',
            'email' => 'aldi@gmail.com',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Ricco Arisdy',
            'email' => 'ricco@gmail.com',
            'is_admin' => true,
        ]);

        // Factory
        User::factory(100)->create();
        Category::factory(100)->create();
        Todo::factory(500)->create();
        Order::factory(100)->create();
        // Factory with Relationship
        // User::all()->each(function (User $user) {
        //     $user->todos()->saveMany(Todo::factory(10)->make());
        // });
        // User::factory(100)->create()->each(function (User $user) {
        //     $user->todos()->saveMany(Todo::factory(10)->make());
        // });
    }
}
