<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Posting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create(
            ['name'=>'Harith Irfan',
            'email'=>'harith@gmail.com',
            'status'=> 'public'
        ]);
        
        $user = User::factory()->create(
            ['name'=>'Adam Azlan',
            'email'=>'adam@gmail.com',
            'status'=> 'admin'
        ]);
        
        Posting::factory(12)->create(
            [
                'user_id' => $user->id,
            ]
        );

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
