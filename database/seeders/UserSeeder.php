<?php

namespace Database\Seeders;

use App\Models\FieldOfWork;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('en_EN');
        $fieldOfWorks = FieldOfWork::all();
        for ($i = 0; $i < 20; $i++) {
            $gender = $faker->randomElement(['male', 'female']);
            $user = User::create([
                'gender' => $gender,
                'password' => bcrypt('123456'),
                'linkedInUsername' => 'https://www.linkedin.com/in/' . $faker->name($gender),
                'walletBalance' => 0,
                'image' => rand(1,3).'.jpeg',
                'paymentAmount' => rand(100000,125000),
                'isPaid' => 1,
            ]);
            $randomFields = $fieldOfWorks->random(rand(3, 5))->pluck('id');
            $user->fieldOfWorks()->sync($randomFields);
        }
    }
}
