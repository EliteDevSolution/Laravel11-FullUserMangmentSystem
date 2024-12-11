<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\UserEventLog;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DB;

class CommonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public static $permissions = [
        'all_access' => 'Acesso total',
        'create_edit_delete_expenses' => 'Criar, editar e excluir despesas',
        'download_expenses' => 'Baixar despesas',
        'export_reports' => 'Exportar relatórios',
        'view_budgets' => 'Visualizar orçamentos',
        'configure_budgets' => 'Configurar orçamentos',
        'manage_user_permissions' => 'Gerenciar permissões de usuários',
        'create_users' => 'Criar usuários',
        'deactivate_delete_users' => 'Desativar / Excluir usuários',
        'reset_user_passwords' => 'Resetar senhas de usuários',
        'view_cash_flow' => 'Visualizar fluxo de caixa',
        'monitor_system_logs' => 'Monitorar logs do sistema',
    ];

    public function __construct()
    {
    }

    /**
     * Register session date ragne.
     *
     * @param \Illuminate\Http\Request $request
     * @param String yyyy-mm-dd $endDate
     * @return \Illuminate\Http\Response
     */
    public function ajaxSessionDateRange(Request $request)
    {
        if (request()->ajax()) {
            //String yyyy-mm-dd $startDate
            //String yyyy-mm-dd $endDate
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            session()->put('start_date', $startDate);
            session()->put('end_date', $endDate);
            return new JsonResponse([], 200);
        }
    }


    public static function getPermissions()
    {
        $permissions = \Spatie\Permission\Models\Permission::orderBy('id')->pluck('name')->all();
        $modifiedPermissions = [];
        foreach ($permissions as $permission) {
            if (!Auth::user()->hasRole(__('cruds.user.roles.super_admin')) && $permission == 'all_access') continue;
            $modifiedPermissions[$permission] = CommonController::$permissions[$permission];
        }
        return $modifiedPermissions;
    }

    public static function getRoles()
    {
        $roles = \Spatie\Permission\Models\Role::orderBy('id')->pluck('name')->all();
        $modifiedRoles = [];
        foreach ($roles as $role) {
            if (!Auth::user()->hasRole(__('cruds.user.roles.super_admin')) && $role == __('cruds.user.roles.super_admin')) continue;
            $modifiedRoles['name'] = $role;
        }
        return $modifiedRoles;
    }

    public static function getRolePermissions()
    {
        $roles = \Spatie\Permission\Models\Role::orderBy('id')->get();
        $rolePermissions = [];
        foreach($roles as $roleModel)
        {
            if (!Auth::user()->hasRole(__('cruds.user.roles.super_admin')) && $roleModel->name == __('cruds.user.roles.super_admin')) continue;
                $rolePermissions[$roleModel->name] = $roleModel->permissions()->pluck('name', 'name')->all();
        }
        return $rolePermissions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function testMail(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function downLoadFile(Request $request)
    {
        if (!Auth::guest())
        {
            if(isset($request->filename))
            {
                try {
                    $fileName=$request->filename;
                    $originName = $request->origin;
                    $fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent
                    $filePath = storage_path("app/public/{$fileName}");
                    if(!is_file($filePath) || !file_exists($filePath))
                    {
                        return redirect($request->session()->get('_previous')['url'] ?? '/upload')->with('error', __('global.msg.file_not_found', ['file_name' => $originName]));
                    }
                    return response()->download($filePath, $originName);
                } catch (Throwable $e) {
                    abort(404);
                }
            }
        } else
        {
            abort(404);
        }
    }

    /**
     * Record User Event Logs only Administrator - SA-1, Super Admin Roles.
     * @param  String  $event_type
     * @param  String  $event_content
     * @return boolean
     */
    public static function recordUserEventLog($event_type, $event_content)
    {
        // DB Insert Transaction Processing for Event Log Data
        $status = false;
        DB::transaction(function() use ($event_type, $event_content, &$status) {
            if(UserEventLog::create([
                'id_usuario_cadastro' => auth()->user()->id,
                'tipo_evento' => trim($event_type),
                'evento_conteudo' => trim($event_content)
            ])) $status = true;
        });
        return $status;
    }

    /**
     * Convert pound.
     * @param  String  $value
     * @return string
     */
    public static function asPound($value) {
        $value = floatval($value);
        if ($value < 0) return "-".CommonController::asPound(-$value);
        return '£' . number_format($value, 2);
    }
}
