<?php

use App\Degree;
use App\Department;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $departments = Department::all();

        foreach ($departments as $department) {

            $random = rand(1, 5);

            for ($i = 0; $i < $random; $i++) {

                $degree = new Degree();
                $degree->department_id = $department->id;
                $degree->level = $faker->randomElement(['triennale', 'magistrale']);
                $degree->name = "Corso di " . $faker->words(rand(2, 4), true);
                $degree->address = $faker->address();
                $degree->email = $faker->email();
                $degree->website = 'https://' . $faker->url();

                $degree->save();
            }
        }
    }
}
