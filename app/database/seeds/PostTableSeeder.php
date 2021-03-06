<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(Thread::all() as $thread)
		{
			$rand = rand(5, 10);
			for ($i = 0; $i < $rand; $i++)
			{
			  $user = User::orderBy(DB::raw('RAND()'))->first();
			  $post = Post::create(array(
			    'user_id' => $user->id,
			    'thread_id' => $thread->id,
			    'title'	=>	$faker->bs,
			    'body' => $faker->text,
			    'decay'	=> 0
			  ));
			}
		}
	}

}