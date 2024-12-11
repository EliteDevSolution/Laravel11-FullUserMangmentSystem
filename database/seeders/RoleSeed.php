<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => __('cruds.user.roles.super_admin')]);
        $role->givePermissionTo('all_access');
        $role = Role::create(['name' => __('cruds.user.roles.admin')]);
        $role->givePermissionTo([
            'create_edit_delete_expenses',
            'download_expenses',
            'export_reports',
            'view_budgets',
            'configure_budgets',
            'manage_user_permissions',
            'create_users',
            'deactivate_delete_users',
            'reset_user_passwords',
            'view_cash_flow',
            'monitor_system_logs'
        ]);

        $role = Role::create(['name' => __('cruds.user.roles.client')]);
        $role->givePermissionTo([
            'view_budgets',
            'export_reports'
        ]);

        $role = Role::create(['name' => __('cruds.user.roles.assistant')]);
        $role->givePermissionTo([
            'view_budgets',
            'export_reports'
        ]);

        $role = Role::create(['name' => __('cruds.user.roles.analyst')]);
        $role->givePermissionTo([
            'view_budgets',
            'download_expenses',
            'create_edit_delete_expenses'
        ]);

        $role = Role::create(['name' => __('cruds.user.roles.coordinator')]);
        $role->givePermissionTo([
            'view_cash_flow',
            'configure_budgets',
            'view_budgets',
            'export_reports',
            'download_expenses',
            'create_edit_delete_expenses'
        ]);

        $role = Role::create(['name' => __('cruds.user.roles.manager')]);
        $role->givePermissionTo([
            'monitor_system_logs',
            'view_cash_flow',
            'view_budgets'
        ]);
    }
}
