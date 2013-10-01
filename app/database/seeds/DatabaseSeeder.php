<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('SentrySeederTableSeeder');
		$this->call('SentryGroupSeederTableSeeder');
		$this->call('SentryUserGroupSeederTableSeeder');
		
	}

}