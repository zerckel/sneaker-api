<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(brandcreate::class);
        $this->call(create_products::class);
        $this->call(create_news::class);
    }
}
