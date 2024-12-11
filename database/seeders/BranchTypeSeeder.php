<?php

namespace Database\Seeders;

use App\Models\BranchType;
use Illuminate\Database\Seeder;

class BranchTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['nm_tipo_filial' => 'Headquarters'],
            ['nm_tipo_filial' => 'Branch Office'],
            ['nm_tipo_filial' => 'Subsidiary'],
            ['nm_tipo_filial' => 'Regional Office'],
            ['nm_tipo_filial' => 'Franchise'],
            ['nm_tipo_filial' => 'Representative Office'],
        ];

        foreach ($types as $type) {
            BranchType::create($type);
        }
    }
}