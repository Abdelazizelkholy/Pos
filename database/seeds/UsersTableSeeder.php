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
        $user = \App\User::create([

        	'frist_name' => 'super',
        	'last_name' => 'admin',
        	'email' => 'superadmin@app.com',
        	'password' => bcrypt('12358abcd'),

        ]);

        $user->attachRole('super_admin');
    }
}
