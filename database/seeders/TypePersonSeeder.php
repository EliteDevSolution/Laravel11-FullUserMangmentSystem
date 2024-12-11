<?php

namespace Database\Seeders;

use App\Models\TypePerson;
use Illuminate\Database\Seeder;

class TypePersonSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['nm_tipo_pessoa' => 'Individual'],
            ['nm_tipo_pessoa' => 'Company'],
            ['nm_tipo_pessoa' => 'Non-Profit'],
            ['nm_tipo_pessoa' => 'Government'],
            ['nm_tipo_pessoa' => 'Partnership'],
        ];

        foreach ($types as $type) {
            TypePerson::create($type);
        }
    }
}