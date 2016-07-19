<?php

use Illuminate\Database\Seeder;

class CreateClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('classes')->delete();

        $classes = array(
            ['name' => 'English', 'teacher_id' => '1', 'stage' => '3'],
            ['name' => 'Math', 'teacher_id' => '2', 'stage' => '4'],
            ['name' => 'Gym', 'teacher_id' => '3', 'stage' => '2'],
            ['name' => 'Kurdish', 'teacher_id' => '1', 'stage' => '1'],
            ['name' => 'Arabic', 'teacher_id' => '2', 'stage' => '5'],
            ['name' => 'Agriculture', 'teacher_id' => '1', 'stage' => '6'],
        );

        foreach ($classes as $class)
        {
            \App\Classes::create($class);
        }
    }
}
