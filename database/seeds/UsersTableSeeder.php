<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        //generate 3 users/author
        DB::table('users')->insert([
            'name' => "Apple Aps",
            'email' => 'apple@aps.com',
            'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
            'name' => "test tester",
            'email' => 'test@aps.com',
            'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
            'name' => "user use",
            'email' => 'user@aps.com',
            'password' => bcrypt('secret')
        ]);
    }
}
