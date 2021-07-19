<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert($this->getDataComments());
    }

    public function getDataComments() {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for($i = 0; $i <= 100; $i++) {
            $data[] = [
                'comment' => $faker->realText(),
                'news_id' => $faker->numberBetween(1,101),
                'user_id' => $faker->numberBetween(1,11),
            ];
        }

        return $data;
    }
}
