<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PiwladaModel;

class PiwladaSeeder extends Seeder
{
    public function run()
    {
        // Faker en español
        $faker = \Faker\Factory::create('es_ES');

        $model = new PiwladaModel();

        for ($i = 0; $i < 20; $i++) {

            $data = [
                // NO poner Piw_id porque es autoincrement
                'title'      => $faker->sentence(6),
                'content'    => $faker->paragraph(4),
                'User_id'    => $faker->numberBetween(1, 10),

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ];

            $model->insert($data);
        }
    }
}