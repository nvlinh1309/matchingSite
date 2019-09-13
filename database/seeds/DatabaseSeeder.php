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
        DB::table('users')->insert([
            'name' => 'Mor Test',
            'email' => 'mor_test@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'Car',
            'status' => '1',
            'icon' => 'fa fa-automobile',
        ]);
    }
}
