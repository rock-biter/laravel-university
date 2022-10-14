<?php

use App\Department;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $names = [
            'Dipartimento di Biologia',
            'Dipartimento di Fisica e astronomia',
            'Dipartimento di Matematica',
            'Dipartimento di Neuroscienze',
            'Dipartimento di Scienze Statistiche',
            'Dipartimento di Architettura',
            'Dipartimento di Ingegneria',
            'Dipartimento di Scienze Infermieristiche',
            'Dipartimento di Medicina',
        ];

        foreach ($names as $name) {
            $d = new Department();
            $d->name = $name;
            $d->address = $faker->address();
            $d->phone = $faker->optional()->phoneNumber();
            $d->email = $faker->email();
            $d->website = 'https://' . $faker->domainName();
            $d->head_of_department = $faker->name();

            $d->save();
        }
    }
}
