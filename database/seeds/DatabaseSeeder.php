<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('CreateUserSeeder');
		$this->call('CreateTeachersSeeder');
		$this->call('CreateClassesSeeder');
		$this->call('CreateStudentSeeder');
		$this->call('CreateParentStudentSeeder');
		$this->call('CreateReportSeeder');
	}

}
