<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['nm_status' => 'Active'],
            ['nm_status' => 'Inactive'],
            ['nm_status' => 'Pending'],
            ['nm_status' => 'Archived'],
            ['nm_status' => 'Suspended'],
            ['nm_status' => 'Under Review'],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}