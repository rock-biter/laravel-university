<?php

use App\Course;
use App\Teacher;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $courses = Course::all()->pluck('id');

        for ($i = 0; $i < 500; $i++) {

            $t = new Teacher();
            $t->name = $faker->firstName();
            $t->surname = $faker->lastName();
            $t->phone = $faker->numerify('+### ########');
            $t->email = $faker->email();
            $t->office_address = $faker->address();
            $t->office_number = $faker->numerify('##');

            $t->save();

            // sync con i corsi
            $courses_id = $courses->shuffle()->take(rand(1, 3))->all();
            $t->courses()->sync($courses_id);
        }
    }
}
