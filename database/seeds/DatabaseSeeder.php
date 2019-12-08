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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Ben',
            'email' => 'benites@i.ua',
            'password' => bcrypt('%TGBvfr4'),
            'is_admin' => 1,
            'company_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Felix',
            'email' => 'Felix@i.ua',
            'password' => bcrypt('111111'),
            'is_admin' => 0,
            'company_id' => 2,
        ]);

        DB::table('companies')->insert([
            'title' => 'Миша и Ко',
            'description' => 'From Felix@i.ua',

        ]);
        DB::table('companies')->insert([
            'title' => 'Андро и Ко',
            'description' => 'From Felix@i.ua',

        ]);
    }
}
