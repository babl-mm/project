<?php

class SentrySeederTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('sentryseeder')->truncate();

		DB::table('users')->delete();
		DB::table('groups')->delete();
		DB::table('users_groups')->delete();

		Sentry::getUserProvider()->create(array(
				'email'	=> 'admin@gmail.com',
				'password' => 'admin',
				'first_name'=> 'Yethu',
				'last_name' => 'Aung',
				'activated' => 1,
			));

		Sentry::getUserProvider()->create(array(
				'email'	=> 'user@gmail.com',
				'password' => 'user',
				'first_name'=> 'Mg Mg',
				'last_name' => 'Thiha',
				'phoneno' => '959420057168',
				'dob' => '12-20',
				'address' => 'No 164 Anawyahtar Road',
				'city' => 'Yangon',
				'gender' => 'Male',
				'activated' => 1,
			));

	

		// Uncomment the below to run the seeder
		// DB::table('sentryseeder')->insert($sentryseeder);

		// Uncomment the below to run the seeder
		// DB::table('sentryseeder')->insert($sentryseeder);
	}

}
