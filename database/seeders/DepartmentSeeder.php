<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'nm_departamento' => 'Human Resources',
                'cd_departamento' => 'HR001',
                'nm_descricao' => 'HR department handling personnel matters',
                'id_status' => 1,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_departamento' => 'Information Technology',
                'cd_departamento' => 'IT001',
                'nm_descricao' => 'IT support and infrastructure',
                'id_status' => 1,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_departamento' => 'Finance',
                'cd_departamento' => 'FIN001',
                'nm_descricao' => 'Financial management and accounting',
                'id_status' => 1,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_departamento' => 'Marketing',
                'cd_departamento' => 'MKT001',
                'nm_descricao' => 'Marketing and advertising',
                'id_status' => 1,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}