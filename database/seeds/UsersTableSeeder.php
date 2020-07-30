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
            'name' => 'Saima Shahrin',
            'email' => 'saima@gmail.com',
            'age' => '23',
            'contact' => '01670605075',
            'password' => bcrypt('rootadmin'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Myful Khan',
            'email' => 'myful@gmail.com',
            'age' => '26',
            'contact' => '01712121212',
            'password' => bcrypt('rootauthor'),
        ]);
    }
}
