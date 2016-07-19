<?php

use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->delete();

            ['name' => 'Nabaz Maaruf', 'email' => 'nabaz@example.com', 'password' => 'secret' , 'role' => 'admin', 'status' => 'active'],
            ['name' => 'Diyar Maaruf', 'email' => 'diyar@example.com', 'password' => 'secret', 'role' => 'admin', 'status' => 'active'],
            ['name' => 'Danar Maaruf', 'email' => 'danar@example.com', 'password' => 'secret', 'role' => 'admin', 'status' => 'active'],
        );

        foreach ($users as $user)        $users = array(

        {
            \App\User::create($user);
        }

    }


    public function down()
    {
        DB::table('users')->delete();
    }

}
