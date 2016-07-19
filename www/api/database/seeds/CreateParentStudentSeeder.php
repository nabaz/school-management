<?php

use Illuminate\Database\Seeder;

class CreateParentStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_students')->delete();

        $parentStudents = array(
            ['student_id'  => '1', 'name' => 'John Robert', 'phone' => '012346789', 'email' => 'jrobert@example.com',
              'occupancy' => 'Business Owner', 'status' => 'Married' ],
            ['student_id'  => '1', 'name' => 'John Robert', 'phone' => '012346789', 'email' => 'jrobert@example.com',
              'occupancy' => 'Business Owner', 'status' => 'Married' ],
            ['student_id'  => '1', 'name' => 'John Robert', 'phone' => '012346789', 'email' => 'jrobert@example.com',
              'occupancy' => 'Business Owner', 'status' => 'Married' ],
            ['student_id'  => '1', 'name' => 'John Robert', 'phone' => '012346789', 'email' => 'jrobert@example.com',
             'occupancy' => 'Business Owner', 'status' => 'Married' ],

        );
        foreach ($parentStudents as $parentStudent)
        {
            \App\ParentStudent::create($parentStudent);
        }
    }
}
