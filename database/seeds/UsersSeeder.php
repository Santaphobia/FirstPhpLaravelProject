<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getDataUsers());
    }

    public function getDataUsers() {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for($i = 0; $i <= 10; $i++) {
            $data[] = [
                'name' => $faker->firstName,
                'email' => $faker->safeEmail,
                'password' => $faker->password(),
            ];
        }

        return $data;
    }
}
