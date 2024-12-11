<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    public function run(): void
    {
        $subcategories = [
            [
                'nm_subcategoria' => 'Paper Products',
                'cd_subcategoria' => 'PAP001',
                'nm_descricao' => 'Paper, notebooks, and related items',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_subcategoria' => 'Laptops',
                'cd_subcategoria' => 'LAP001',
                'nm_descricao' => 'Portable computers and accessories',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_subcategoria' => 'Chairs',
                'cd_subcategoria' => 'CHR001',
                'nm_descricao' => 'Office chairs and seating',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_subcategoria' => 'Digital Marketing',
                'cd_subcategoria' => 'DIG001',
                'nm_descricao' => 'Online marketing services',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}