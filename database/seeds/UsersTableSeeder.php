<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin account
        User::create([
            'name' => 'John Doe',
            'email' => 'demo@demo.com',
            'password' => bcrypt('secret'),
        ]);

        // Generate the rest randomly
        factory(User::class, 10)->create();
    }
}
