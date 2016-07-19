<?php

use Illuminate\Database\Seeder;

class CreateParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_students')->delete();

        $parents = array(
            ['name'  => 'Test1 Test2','email' => 'test1@example.com', 'phone' => '222-000-2222', 'student_id' => 1],
            ['name'  => 'Test12 Test22','email' => 'test12@example.com', 'phone' => '333-000-3333', 'student_id' => 2],
            ['name'  => 'Test13 Test32','email' => 'test13@example.com', 'phone' => '444-000-4444', 'student_id' => 3],
            ['name'  => 'Test14 Test42','email' => 'test14@example.com', 'phone' => '555-000-5555', 'student_id' => 4],


        );

        foreach ($parents as $parent)
        {
            \App\ParentStudent::create($parent);
        }
    }
}
