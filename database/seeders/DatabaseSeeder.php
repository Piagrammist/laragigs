<?php

namespace Database\Seeders;

use App\Models\{User, Listing};
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => '12345678',
        ]);
        Listing::factory(10)->create(['user_id' => $user->id]);
    }
}
