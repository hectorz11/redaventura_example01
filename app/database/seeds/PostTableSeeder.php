<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {

	public function run()
	{
		DB::table('posts')->delete();
		$faker = Faker::create('en_US');

		for($i = 0; $i<50; $i++) {

			$post = new Post;
			$post->title = $faker->unique()->sentence($nbWords = 4);
			$post->image_url = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
			$post->body = $faker->text($maxNbChars = 250);
			$post->user_id = $faker->randomElement($array = array('1','2','3','4','5','6','7','8','9','10'));
			$post->status = 1;
			$post->save();
		}
	}
}