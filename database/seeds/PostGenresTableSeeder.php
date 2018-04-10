<?php

use Illuminate\Database\Seeder;
use App\PostGenre;

class PostGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostGenre::class, 5)->create();
    }
}
