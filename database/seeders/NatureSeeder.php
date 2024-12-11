<?php

namespace Database\Seeders;

use App\Models\Nature;
use Illuminate\Database\Seeder;

class NatureSeeder extends Seeder
{
    public function run(): void
    {
        $natures = [
            [
                'nm_natureza' => 'Operating Expenses',
                'cd_natureza' => 'OPX001',
                'nm_descricao' => 'Regular operational expenses',
                'id_status' => 1,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_natureza' => 'Capital Expenditure',
                'cd_natureza' => 'CAP001',
                'nm_descricao' => 'Long-term investments',
                'id_status' => 1,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
            [
                'nm_natureza' => 'Marketing Expenses',
                'cd_natureza' => 'MKT001',
                'nm_descricao' => 'Marketing and advertising costs',
                'id_status' => 1,
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
            ],
        ];

        foreach ($natures as $nature) {
            Nature::create($nature);
        }
    }
}