<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = User::create([
            'nome' => 'Super Admin',
            'email' => 'superadmin@ag.com',
            'cpf' => '123.456.789-09',
            'telefone' => '123456789',
            'password' => 'SuperAdmin12345!',
            'nivel' => 1,
            'status' => 1,
        ]);
        $user->assignRole(__('cruds.user.roles.super_admin'));
        $user = User::create([
            'nome' => 'Manager',
            'email' => 'manager@ag.com',
            'cpf' => '123.456.789-10',
            'telefone' => '123456711',
            'password' => 'Manager12345!',
            'nivel' => 1,
            'status' => 1,
        ]);
        $user->assignRole(__('cruds.user.roles.manager'));
        $user = User::create([
            'nome' => 'Analyst',
            'email' => 'analyst@ag.com',
            'cpf' => '123.456.789-11',
            'telefone' => '123456712',
            'password' => 'Analyst12345!',
            'nivel' => 0,
            'status' => 1,
        ]);
        $user->assignRole(__('cruds.user.roles.analyst'));
    }
}
