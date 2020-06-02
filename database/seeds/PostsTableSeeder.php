<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0 ; $i<40 ; $i++)
        {
            DB::table('posts')->insert([
                'title'=>$faker->text($maxNvchars = 50),
                'text'=>$faker->text,
                'price'=>$faker->randomNumber(4),
                'user_id'=>rand(1,5),
                'category_id'=>rand(1,5),
                'country_id'=>rand(1,6),
            ]);
        }
    }
}
