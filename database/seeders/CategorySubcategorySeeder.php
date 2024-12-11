<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategorySubcategory;

class CategorySubcategorySeeder extends Seeder
{
    public function run(): void
    {
        $relationships = [
            [
                'id_categoria' => 1,
                'id_subcategoria' => 1,
                'dt_cadadtro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'id_categoria' => 2,
                'id_subcategoria' => 2,
                'dt_cadadtro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'id_categoria' => 3,
                'id_subcategoria' => 3,
                'dt_cadadtro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'id_categoria' => 4,
                'id_subcategoria' => 4,
                'dt_cadadtro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
        ];

        foreach ($relationships as $relationship) {
            CategorySubcategory::create($relationship);
        }
    }
}