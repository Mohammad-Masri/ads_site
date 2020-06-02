<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0 ; $i<5 ; $i++)
        {
            DB::table('users')->insert([
                'name'=>$faker->unique()->userName,
                'email'=>$faker->unique()->email,
                'password'=>bcrypt('password'),
                'role_id'=>rand(1,2),
            ]);
        }
    }
}
