<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class create_news extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('news')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'title' => $faker->name,
            'resume' => $faker->text(100),
            'description' => $faker->text(400),
            'author' => $faker->name,
            'isPublished' => rand(0,1)
        ]);
    }
}
