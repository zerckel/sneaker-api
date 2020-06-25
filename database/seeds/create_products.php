<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class create_products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('products')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'name' => $faker->name,
            'mainpics' => "https://www.altansia.com/wp-content/uploads/2019/05/nike-3-logo-png-transparent.png",
            'secondarypics' => serialize(["https://www.altansia.com/wp-content/uploads/2019/05/nike-3-logo-png-transparent.png","https://www.altansia.com/wp-content/uploads/2019/05/nike-3-logo-png-transparent.png"]),
            'description' => $faker->text(),
            'colors' => serialize([$faker->unique()->colorName, $faker->unique()->colorName, $faker->unique()->colorName]),
            'brandId' => DB::table('brands')->inRandomOrder()->limit(1)->get()[0]->id,
            'price' => rand(10, 100),
            'isPublished' => (bool)random_int(0, 1)
        ]);
    }
}
