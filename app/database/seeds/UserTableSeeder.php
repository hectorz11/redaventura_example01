<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		$faker = Faker::create('en_US');

		for($i = 0; $i<10; $i++) {

			$user = new User;
			$user->first_name = $faker->firstName;
			$user->last_name = $faker->lastName;
			$user->email = $faker->unique()->userName.'@yopmail.com';
			$user->status = 1;
			$user->save();
		}
	}
}