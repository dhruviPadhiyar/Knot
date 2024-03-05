<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email'=> 'admin@test.com',
            'is_admin' =>1,
            'password'=> bcrypt('admin123')
        ]);

        Category::factory(10)->create();

        User::factory(10)->create();

        // Status::factory(3)->create();
        Status::factory()->create([
            'name'=> 'Up coming',
            'description' => 'about to happen'
        ]);
        Status::factory()->create([
            'name'=> 'On going',
            'description' => 'happening'
        ]);
        Status::factory()->create([
            'name'=> 'Ended',
            'description' => 'already happened'
        ]);

    }
}
