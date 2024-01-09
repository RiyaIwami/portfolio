<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        // Use the UserFactory to create a new User instance
        User::factory()->create([
            'name' => 'もぐもぐ子',
            'email' => 'test@test.test',
            'email_verified_at' => now(),
            'password' => Hash::make('testtest'),
        ]);
    }
}
