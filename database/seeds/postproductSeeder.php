<?php

use Illuminate\Database\Seeder;

class postproductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\postproduct::class,10)->create();
    }
}
