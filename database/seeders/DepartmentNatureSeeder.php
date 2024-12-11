<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DepartmentNature;
use Illuminate\Support\Facades\DB;

class DepartmentNatureSeeder extends Seeder
{
    public function run(): void
    {
        $relationships = [
            [
                'id_departamento' => 1,
                'id_natureza' => 1,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'id_departamento' => 2,
                'id_natureza' => 2,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'id_departamento' => 4,
                'id_natureza' => 3,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
        ];

        foreach ($relationships as $relationship) {
            DepartmentNature::create($relationship);
        }
    }
}