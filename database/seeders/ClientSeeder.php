<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'id_tipo_pessoa' => 2,
                'nm_cliente' => 'Enterprise Corp',
                'nm_email' => 'contact@enterprise.com',
                'nr_telefone' => '1234567890',
                'nm_documento' => 'CLI123456',
                'nm_codigo' => 'CL001',
                'nm_razao_social' => 'Enterprise Corporation Ltd',
                'nm_endereco' => 'Business Avenue',
                'nr_endereco' => '100',
                'nm_complemento' => 'Floor 15',
                'nm_cep' => '12345-678',
                'nm_municipio' => 'Chicago',
                'nm_estado' => 'IL',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
                'dt_atualizacao' => date('Y-m-d H:i:s'),
            ],
            [
                'id_tipo_pessoa' => 1,
                'nm_cliente' => 'John Smith',
                'nm_email' => 'john@email.com',
                'nr_telefone' => '9876543210',
                'nm_documento' => 'CLI789012',
                'nm_codigo' => 'CL002',
                'nm_razao_social' => 'Facebook',
                'nm_endereco' => 'Residential Street',
                'nr_endereco' => '200',
                'nm_complemento' => 'Apt 10',
                'nm_cep' => '98765-432',
                'nm_municipio' => 'Miami',
                'nm_estado' => 'FL',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
                'dt_atualizacao' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}