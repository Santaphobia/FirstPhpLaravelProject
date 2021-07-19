<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getDataCategories());
        DB::table('news')->insert($this->getDataNews());
    }

    private function getDataCategories() {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for($i = 0; $i <= 10; $i++) {
            $data[] = [
                'title' => $faker->realText($faker->numberBetween(10,49)),
                'description' => $faker->realText(100),
                'is_active' => $faker->boolean(50)
            ];
        }

        return $data;
    }

    private function getDataNews() {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for($i = 0; $i <= 100; $i++) {
            $data[] = [
                'title' => $faker->realText($faker->numberBetween(10,49)),
                'text' => $faker->realText(200),
                'description' => $faker->realText(100),
                'is_active' => $faker->boolean(50),
                'categories_id' => $faker->numberBetween(1,11)
            ];
        }

        return $data;
    }
}
