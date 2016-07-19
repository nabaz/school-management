<?php

use Illuminate\Database\Seeder;

class CreateStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();

        $students = array(
            ['name'  => 'Stud1 Stud2','email' => 'Stud1@example.com', 'stage' => '2', 'parent_id' => 1],
            ['name'  => 'Stud3 Stud34','email' => 'Stud3@example.com', 'stage' => '4', 'parent_id' => 3],
            ['name'  => 'Stud2 Stud32','email' => 'Stud2@example.com', 'stage' => '3', 'parent_id' => 2],
            ['name'  => 'Stud4 Test45','email' => 'Stud4@example.com', 'stage' => '5', 'parent_id' => 4],
            ['name'  => 'Stud5 Test5','email' => 'Stud4@example.com', 'stage' => '4', 'parent_id' => 5],
            ['name'  => 'Stud6 Test6','email' => 'Stud4@example.com', 'stage' => '6', 'parent_id' => 6],


        );

        foreach ($students as $student)
        {
            \App\Student::create($student);
        }
    }
}
