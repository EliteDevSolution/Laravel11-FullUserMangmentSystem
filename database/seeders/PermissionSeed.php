<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'all_access']); // Acesso total
        Permission::create(['name' => 'create_edit_delete_expenses']); // Criar, editar e excluir despesas
        Permission::create(['name' => 'download_expenses']); // Baixar despesas
        Permission::create(['name' => 'export_reports']); // Exportar relatórios
        Permission::create(['name' => 'view_budgets']); // Visualizar orçamentos
        Permission::create(['name' => 'configure_budgets']); // Configurar orçamentos
        Permission::create(['name' => 'manage_user_permissions']); // Gerenciar permissões de usuários
        Permission::create(['name' => 'create_users']); // Criar usuários
        Permission::create(['name' => 'deactivate_delete_users']); // Desativar / Excluir usuários
        Permission::create(['name' => 'reset_user_passwords']); // Resetar senhas de usuários
        Permission::create(['name' => 'view_cash_flow']); // Visualizar fluxo de caixa
        Permission::create(['name' => 'monitor_system_logs']); // Monitorar logs do sistema
    }
}
