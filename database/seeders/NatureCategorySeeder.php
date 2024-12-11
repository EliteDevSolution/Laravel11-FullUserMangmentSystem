<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NatureCategory;

class NatureCategorySeeder extends Seeder
{
    public function run(): void
    {
        $relationships = [
            [
                'id_natureza' => 1,
                'id_categoria' => 1,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'id_natureza' => 2,
                'id_categoria' => 2,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'id_natureza' => 3,
                'id_categoria' => 4,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
        ];

        foreach ($relationships as $relationship) {
            NatureCategory::create($relationship);
        }
    }
}