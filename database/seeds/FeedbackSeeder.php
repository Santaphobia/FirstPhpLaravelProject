<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback')->insert($this->getDataFeedback());
    }

    public function getDataFeedback() {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for($i = 0; $i <= 100; $i++) {
            $data[] = [
                'review' => $faker->realText(),
                'name' => $faker->firstName,
                'email' => $faker->safeEmail,
            ];
        }

        return $data;
    }
}
