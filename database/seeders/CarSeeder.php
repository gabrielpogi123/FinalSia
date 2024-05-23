<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     Car::factory(50)->create();
    // }

    public function run() : void
    {
        $cars = [
            [
                'make' => 'Ford',
                'model' => 'Fiesta',
                'rent_fee' => 2500.00,
            ],
            [
                'make' => 'Toyota',
                'model' => 'Corolla',
                'rent_fee' => 3000.00,
            ],
            [
                'make' => 'Honda',
                'model' => 'Civic',
                'rent_fee' => 2750.00,
            ],
            [
                'make' => 'Chevrolet',
                'model' => 'Malibu',
                'rent_fee' => 3250.00,
            ],
            [
                'make' => 'Volkswagen',
                'model' => 'Jetta',
                'rent_fee' => 3500.00,
            ],
            [
                'make' => 'Nissan',
                'model' => 'Altima',
                'rent_fee' => 3000.00,
            ],
            [
                'make' => 'Subaru',
                'model' => 'Impreza',
                'rent_fee' => 2750.00,
            ],
            [
                'make' => 'Ford',
                'model' => 'Mustang',
                'rent_fee' => 4000.00,
            ],
            [
                'make' => 'BMW',
                'model' => '3 Series',
                'rent_fee' => 25000.00,
            ],
            [
                'make' => 'Mercedes-Benz',
                'model' => 'C-Class',
                'rent_fee' => 5000.00,
            ],
            [
                'make' => 'Audi',
                'model' => 'A4',
                'rent_fee' => 4750.00,
            ],
        ];


        foreach ($cars as $car) {
            DB::table('cars')->insert($car);
        }
    }
}
