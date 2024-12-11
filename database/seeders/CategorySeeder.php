<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'nm_categoria' => 'Office Supplies',
                'cd_categoria' => 'OFF001',
                'nm_descricao' => 'General office supplies and materials',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_categoria' => 'IT Equipment',
                'cd_categoria' => 'IT001',
                'nm_descricao' => 'Computer hardware and accessories',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_categoria' => 'Furniture',
                'cd_categoria' => 'FUR001',
                'nm_descricao' => 'Office furniture and fixtures',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_categoria' => 'Marketing',
                'cd_categoria' => 'MKT001',
                'nm_descricao' => 'Marketing materials and services',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}