<?php

use App\User;
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
        $user = new User();
        $user->first_name = str_random(10);
        $user->last_name = str_random(10);
        $user->email = str_random(10).'@gmail.com';
        $user->address = str_random(10);
        $user->contact = (int) rand (1 , 10);
        $user->role_id= (int) rand (2 , 3);
        $user->user_status_id= (int) rand (1 , 2);
        $user->password = bcrypt('secret');
        $user->save();

    }
}
