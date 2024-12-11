<?php

namespace Database\Seeders;

use App\Models\BranchBank;
use Illuminate\Database\Seeder;

class BranchBankSeeder extends Seeder
{
    public function run(): void
    {
        $branchBanks = [
            [
                'id_filial' => 1,
                'cd_banco' => 'BNK001',
                'nm_banco' => 'First National Bank',
                'nr_agencia' => '0001',
                'nr_conta' => '123456789',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
                'dt_alteracao' => date('Y-m-d H:i:s'),
                'fl_filial_bancario' => '001'
            ],
            [
                'id_filial' => 2,
                'cd_banco' => 'BNK002',
                'nm_banco' => 'Western Bank',
                'nr_agencia' => '0002',
                'nr_conta' => '987654321',
                'dt_cadastro' => date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => 2,
                'dt_alteracao' => date('Y-m-d H:i:s'),
                'fl_filial_bancario' => '002'
            ],
        ];

        foreach ($branchBanks as $branchBank) {
            BranchBank::create($branchBank);
        }
    }
}