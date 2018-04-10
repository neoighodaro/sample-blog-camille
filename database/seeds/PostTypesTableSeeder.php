<?php

use Illuminate\Database\Seeder;
use App\PostType;

class PostTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostType::class, 5)->create();
    }
}
