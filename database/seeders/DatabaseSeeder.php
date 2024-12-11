<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeed::class,
            RoleSeed::class,
            UserSeed::class,
            StatusSeeder::class,
            TypePersonSeeder::class,
            BranchTypeSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            CategorySubcategorySeeder::class,
            DepartmentSeeder::class,
            NatureSeeder::class,
            NatureCategorySeeder::class,
            DepartmentNatureSeeder::class,
            CostCenterSeeder::class,
            BranchSeeder::class,
            BranchBankSeeder::class,
            SupplierSeeder::class,
            ClientSeeder::class,
        ]);
    }
}
