<?php

use Illuminate\Database\Seeder;

class userseeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<20;$i++) {
            $faker =\Faker\Factory::create();
            $user = new \App\User();
            $user->email = $faker->email;
            $user->name = $faker->name;
            $user->password = $faker->password();
            $user ->save();
        }
    }
}
