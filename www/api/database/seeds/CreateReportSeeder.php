<?php

use Illuminate\Database\Seeder;

class CreateReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->delete();


        $reports = array(
            ['student_id'  => '1','class_year' => '2015-2016', 'stage' => '1', 'group' => 'A', 'class_id' => '1', 'sem1_eval_1' => '20',
             'sem1_eval_2' => '18','sem1_eval_3' => '17', 'sem1_eval_4' => '19','sem2_eval_1' => '20',
             'sem2_eval_2' => '18','sem2_eval_3' => '17', 'sem2_eval_4' => '19' ],
            ['student_id'  => '2','class_year' => '2015-2016', 'stage' => '1', 'group' => 'A', 'class_id' => '2', 'sem1_eval_1' => '20',
             'sem1_eval_2' => '18','sem1_eval_3' => '17', 'sem1_eval_4' => '19','sem2_eval_1' => '20',
             'sem2_eval_2' => '18','sem2_eval_3' => '17', 'sem2_eval_4' => '19' ],
            ['student_id'  => '3','class_year' => '2015-2016', 'stage' => '1', 'group' => 'A', 'class_id' => '3', 'sem1_eval_1' => '20',
             'sem1_eval_2' => '18','sem1_eval_3' => '17', 'sem1_eval_4' => '19','sem2_eval_1' => '20',
             'sem2_eval_2' => '18','sem2_eval_3' => '17', 'sem2_eval_4' => '19' ],
            ['student_id'  => '4','class_year' => '2015-2016', 'stage' => '1', 'group' => 'A', 'class_id' => '4', 'sem1_eval_1' => '20',
             'sem1_eval_2' => '18','sem1_eval_3' => '17', 'sem1_eval_4' => '19','sem2_eval_1' => '20',
             'sem2_eval_2' => '18','sem2_eval_3' => '17', 'sem2_eval_4' => '19' ],

        );
        foreach ($reports as $report)
        {
            \App\Report::create($report);
        }
    }
}
