<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            [
                'id_tipo_filial' => 1,
                'nm_filial' => 'Main Office',
                'nm_documento' => 'DOC123456',
                'nm_codigo' => 'HQ001',
                'nm_razao_social' => 'Company Headquarters Ltd',
                'nm_social' => 'Company HQ',
                'nr_telefone' => '1234567890',
                'nm_email' => 'hq@company.com',
                'nm_endereco' => 'Business District',
                'nr_endereco' => '100',
                'nm_complemento' => 'Floor 20',
                'nm_cep' => '12345-678',
                'nm_municipio' => 'New York',
                'nm_estado' => 'NY',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
                'dt_alteracao' => date('Y-m-d H:i:s'),
            ],
            [
                'id_tipo_filial' => 2,
                'nm_filial' => 'West Branch',
                'nm_documento' => 'DOC789012',
                'nm_codigo' => 'BR001',
                'nm_razao_social' => 'Company West Branch Ltd',
                'nm_social' => 'Company West',
                'nr_telefone' => '9876543210',
                'nm_email' => 'west@company.com',
                'nm_endereco' => 'West Street',
                'nr_endereco' => '200',
                'nm_complemento' => 'Suite 10',
                'nm_cep' => '98765-432',
                'nm_municipio' => 'Los Angeles',
                'nm_estado' => 'CA',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
                'dt_alteracao' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}