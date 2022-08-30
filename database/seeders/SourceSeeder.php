<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('sources')
            ->insert($this->generateSources());
    }

    protected function generateSources(): array
    {
        $faker = Factory::create();
        $sources = [];
        for ($i = 1; $i <= 10; $i++) {
            $sources[] = [
                'name' => $faker->sentence(2),
                'description' => $faker->sentence(5),
                'url' => $faker->url()
            ];
        }
        return $sources;
    }
}
