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
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Shaker Ahmed',
            'email' => 'shaker@gmail.com',
            'email_verified_at'=> '2022-03-25 18:11:50',
            'age' => '24',
            'contact' => '01612131415',
            'created_at'=>"2022-03-25 18:11:50",
            'password' => bcrypt('10101010'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Dipika Malakar',
            'email' => 'dipika@gmail.com',
            'email_verified_at'=> '2022-03-25 18:11:50',
            'age' => '25',
            'contact' => '01712121212',
            'created_at'=> '2022-03-25 18:11:50',
            'password' => bcrypt('10101010'),
        ]);
    }
}


