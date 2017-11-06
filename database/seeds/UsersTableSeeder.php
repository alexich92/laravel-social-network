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
        App\User::create([
            'name'=>'Alex',
            'password'=>bcrypt('admin'),
            'email'=>'9292alexich@gmail.com',
            'isadmin'=>1,
            'avatar'=>'default.jpg',
            'username' =>'Alex'
        ]);

        App\User::create([
            'name'=>'Rico',
            'password'=>bcrypt('123456'),
            'email'=>'test@yahoo.com',
            'avatar'=>'default.jpg',
            'username'=>'Rico'
        ]);
    }
}
