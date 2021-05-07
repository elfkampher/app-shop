<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'admin',
            'email' => 'jgutierrez@raymond.com.mx',
            'password' => bcrypt('admin'),
            'admin' => true
        ]);
    }
}
