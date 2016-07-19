<?php

use Illuminate\Database\Seeder;

class CreateTeachersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('teachers')->delete();

		$teachers = array(
			['name'  => 'Nabaz Maaruf','email' => 'nabaz@example.com', 'plla' => '2'],
			['name'  => 'Diyar Maaruf','email' => 'diyar@example.com', 'plla' => '1'],
			['name'  => 'Danar Maaruf','email' => 'danar@example.com', 'plla' => '3'],


		);

		foreach ($teachers as $teacher)
		{
			\App\Teacher::create($teacher);
		}
	}
}
