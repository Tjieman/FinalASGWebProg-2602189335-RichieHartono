<?php

namespace Database\Seeders;

use App\Models\FieldOfWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FieldOfWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_EN');
        for ($i=0; $i < 10; $i++) { 
            FieldOfWork::create([
                'name' => $faker->jobTitle(),
            ]);
        }
    }
}
