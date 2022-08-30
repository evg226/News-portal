<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')
            ->insert($this->generateCategories());
    }

    protected function generateCategories(): array
    {
        $faker = Factory::create();
        $categories = [];
        for ($i = 1; $i <= 20; $i++) {
            $categories[] = [
                'title' => $faker->sentence(3),
                'author' => $faker->name(),
            ];
        }
        return $categories;
    }
}
