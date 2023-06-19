<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory(3)->create(['role'=> 1]);

        // \App\Models\User::factory(10)->create(['dob'=> '2012-01-02 07:30:00']);

        // \App\Models\User::factory(3)->create(['role'=> 1,'dob'=> '1999-01-02 07:30:00']);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
