<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
        $sources[] = [
            'name' => 'Нативный',
            'description' => 'Собственый источник новостей',
            'url' => config('app.url')
        ];
        for ($i = 2; $i <= 10; $i++) {
            $sources[] = [
                'name' => $faker->sentence(2),
                'description' => $faker->sentence(5),
                'url' => $faker->url()
            ];
        }
        return $sources;
    }
}
