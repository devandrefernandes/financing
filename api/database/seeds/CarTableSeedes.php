<?php

use Illuminate\Database\Seeder;
use App\Modules\Car\Models\Car;

class CarTableSeeder extends Seeder
{
    public function run()
    {
        $cars = [
            [
              'name' => 'Chevrolet Onix 1.0 Branco',
              'price' => 45599.99,
              'image_url' => 'https://www.chevrolet.com.br/content/dam/chevrolet/mercosur/brazil/portuguese/index/cars/2021-onix/optimizaci%C3%B3n/mov/1-onix-premier-branco-summit.jpg?imwidth=960'
            ],
            [
              'name' => 'Chevrolet Onix 1.6 Branco',
              'price' => 60000.00,
              'image_url' => 'https://www.chevrolet.com.br/content/dam/chevrolet/mercosur/brazil/portuguese/index/cars/2021-onix/optimizaci%C3%B3n/mov/1-onix-premier-branco-summit.jpg?imwidth=960'
            ],
            [
              'name' => 'Fiat Bravo 1.6 Branco',
              'price' => 70000.00,
              'image_url' => 'https://s2.glbimg.com/suGqF0Rz479P2eFLxyE25Vz4-vQ=/0x0:620x400/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/x/Y/gc3DSuQwux9nAlO503pQ/2015-02-06-bravo-blackmotion.png'
            ],
        ];

        foreach ($cars as $car) {
            factory(Car::class)->create($car);
        }
    }
}
