<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            [
                'id_tp_pessoa' => 2,
                'nm_fornecedor' => 'Office Supply Co',
                'nm_documento' => 'SUP123456',
                'nm_codigo' => 'SP001',
                'nm_razao_social' => 'Office Supply Corporation',
                'nm_social' => 'OSC',
                'nm_endereco' => 'Supply Street',
                'nr_endereco' => '100',
                'nm_complemento' => 'Suite 200',
                'nm_estado' => 'NY',
                'nm_municipio' => 'New York',
                'nm_cep' => '12345-678',
                'nr_telefone' => '1234567890',
                'nm_email' => 'contact@officesupply.com',
                'cd_banco' => 'BNK001',
                'nm_banco' => 'First Bank',
                'nr_agencia' => '0001',
                'nr_conta' => '123456789',
                'nm_chave_pix' => 'pix@officesupply.com',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
                'dt_atualizacao' => date('Y-m-d H:i:s'),
            ],
            [
                'id_tp_pessoa' => 1,
                'nm_fornecedor' => 'Tech Solutions',
                'nm_documento' => 'SUP789012',
                'nm_codigo' => 'SP002',
                'nm_razao_social' => 'Tech Solutions Ltd',
                'nm_social' => 'TSL',
                'nm_endereco' => 'Tech Avenue',
                'nr_endereco' => '200',
                'nm_complemento' => 'Floor 10',
                'nm_estado' => 'CA',
                'nm_municipio' => 'San Francisco',
                'nm_cep' => '98765-432',
                'nr_telefone' => '9876543210',
                'nm_email' => 'contact@techsolutions.com',
                'cd_banco' => 'BNK002',
                'nm_banco' => 'Tech Bank',
                'nr_agencia' => '0002',
                'nr_conta' => '987654321',
                'nm_chave_pix' => 'pix@techsolutions.com',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
                'dt_atualizacao' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}