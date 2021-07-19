<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert($this->getDataLikes());
    }

    public function getDataLikes() {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for($i = 0; $i <= 100; $i++) {
            $data[] = [
                'news_id' => $faker->numberBetween(1,101),
                'user_id' => $faker->numberBetween(1,11),
            ];
        }

        return $data;
    }
}
