<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class brandcreate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('brands')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $faker->company,
            'pics' => "https://www.altansia.com/wp-content/uploads/2019/05/nike-3-logo-png-transparent.png",
            'banner' => "https://www.altansia.com/wp-content/uploads/2019/05/nike-3-logo-png-transparent.png",
            'description' => $faker->text()
        ]);
    }
}
