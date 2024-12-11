<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\CommonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('permission:all_access|manage_user_permissions');
    }
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = __("cruds.user.title");
        $users = [];
        $user_list = User::where('id', '<>', 1)->get();
        foreach ($user_list as $val) {
            $users[$val['id']] = $val['nome'] . ' (' . $val['email'] . ')';;
        }

        return view('pages.users.index', compact('users', 'pageTitle'));
    }

    /**
     * Datatable Ajax response Json.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        if (request()->ajax()) {
            $draw = $request->get('draw');
            $start = $request->get('start');
            $length = $request->get('length');
            $searchValue = $request->get('search')['value']; // Search value
            $columnIndex = $request->get('order')[0]['column']; // Column index
            $columnSortOrder = $request->get('order')[0]['dir']; // asc or desc
            $columnName = $request->get('columns')[$columnIndex]['name']; // Column name

            $searchStatusValue = match (strtolower($searchValue)) {
                strtolower(__('global.pending')) => 0,
                strtolower(__('global.approved')) => 1,
                strtolower(__('global.reject')) => 2,
                default => '',
            };

            $searchLevelValue = match (strtolower($searchValue)) {
                strtolower(__('global.operator')) => 0,
                strtolower(__('global.master')) => 1,
                default => '',
            };

            $query = User::query()
                ->where(function ($q) use ($searchValue, $searchLevelValue, $searchStatusValue) {
                    $q->whereHas('roles', function ($q) use ($searchValue) {
                        $q->where('name', 'like', "%$searchValue%");
                    })
                    ->orWhere('nome', 'like', "%$searchValue%")
                    ->orWhere('email', 'like', "%$searchValue%")
                    ->orWhere('cpf', 'like', "%$searchValue%")
                    ->orWhere('telefone', 'like', "%$searchValue%")
                    ->orWhere('created_at', 'like', "%$searchValue%")
                    ->orWhere('nivel', 'like', "%$searchLevelValue%")
                    ->orWhere('status', 'like', "$searchStatusValue");
                });

            $totalCount = $query->count();

            $datas = $query->orderBy($columnName, $columnSortOrder)
                ->offset($start)
                ->limit($length)
                ->get();

            if (!auth()->user()->hasRole(__('cruds.user.roles.super_admin'))) {
                $datas = $datas->filter(function ($user) {
                    return !$user->hasRole(__('cruds.user.roles.super_admin'));
                });
            }

            $resJson =  datatables()->of($datas)
                ->addColumn('nome', function (User $user) {
                    $imgUrl = "";
                    if(is_null($user->avatar) || empty($user->avatar))
                        $imgUrl = url('assets/images/users/default.png');
                    else
                        $imgUrl = url('storage/images/avatars')."/".$user->avatar;

                    return "<img src=$imgUrl class='rounded-circle' height='50' width='50'> ". $user->nome ?? '';
                })->addColumn('role', function (User $user)
                {
                    $res = "";
                    foreach($user->roles()->pluck('name') as $role)
                        $res .= "<span class='badge badge-info'>$role</span>";
                    return $res;
                })->addColumn('status', function (User $user) {
                    if($user->status == 0)
                        return "<span class='badge badge-warning'>".trans('global.pending')."</span>";
                    else if($user->status == 2)
                        return "<span class='badge badge-danger'>".trans('global.reject')."</span>";
                    else
                        return "<span class='badge badge-success'>".trans('global.approved')."</span>";
                })->addColumn('level', function (User $user) {
                    if($user->nivel == 0)
                        return "<span class='badge badge-dark'>".trans('global.operator')."</span>";
                    else
                        return "<span class='badge badge-blue'>".trans('global.master')."</span>";
                })->addColumn('action', function (User $user) {
                    $edtUrl = route('users.edit', $user->id);
                    $userId = $user->id;
                    $resHtml = "<a class='btn btn-info waves-effect btn-rounded waves-light btn-sm' href='$edtUrl'><i class='fe-edit'></i></a> ";
                    $formActionUrl = route('users.destroy', $user->id);
                    $token = csrf_token();
                    $langDelete = trans('global.delete');
                    $resHtml = "";
                    if(auth()->user()->hasAnyPermission(['all_access', 'manage_user_permissions', 'deactivate_delete_users', 'reset_user_passwords', 'create_users']))
                        $resHtml .= "<a class='btn btn-info waves-effect btn-rounded waves-light btn-sm' href='$edtUrl'><i class='fe-edit'></i></a> ";

                    if($user->id != 1)
                    {
                        $resHtml .= "<form action='$formActionUrl' method='POST' onclick='isConfirm(this)' style='display: inline-block;'>
                                        <input type='hidden' name='_method' value='DELETE'>
                                        <input type='hidden' name='_token' value='$token'>
                                        <button type='submit' class='btn btn-danger waves-effect btn-rounded waves-light btn-sm'>
                                            <i class='fe-trash'></i>
                                        </button>
                                    </form>";
                    }
                    return $resHtml;
                })->rawColumns(['nome', 'role', 'created_at', 'level', 'status', 'action'])
                ->skipPaging()
                ->setTotalRecords($totalCount)
                ->setFilteredRecords($totalCount)->toJson(); //--- Returning Json Data To Client Side

             return $resJson;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = __("cruds.user.title");
        $permissions = CommonController::getPermissions();
        $rolePermissions = CommonController::getRolePermissions();
        //$user->givePermissionTo('all_access');
        // $user = User::find(2); // Replace with the desired user ID
        // $permissions = ['permission1', 'permission2', 'permission3']; // Replace with the desired permissions
        // $user->syncPermissions($permissions);
        //$user->revokePermissionTo('all_access');
        // Get all permissions assigned to the user
        //$permissions = $user->getAllPermissions();
        $level = [__("global.operator"), __("global.master")];
        $status = [__("global.pending"), __("global.approved"), __("global.reject")];
        return view('pages.users.create', compact('pageTitle', 'rolePermissions', 'permissions', 'status', 'level'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rule = [
            'nome' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'cpf' => 'required|min:11|max:14',
            'nivel' => 'required',
            'roles' => 'required',
            'permissions' => 'required',
        ];
        $this->validate($request, $rule);

        if ($request->hasFile('photo')) {

            $image      = $request->file('photo');
            $fileName   = time() . '.' . 'png';

            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            $image->scale(width: 120);
            // save modified image in new format
            if (!Storage::exists('images/avatars')) {
                Storage::makeDirectory('images/avatars');
            }
            $image->toPng()->save(storage_path("app/public/images/avatars/$fileName"));
            $request->request->add(['avatar' => $fileName]); //add request
        }

        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $permissions = $request->input('permissions') ? $request->input('permissions') : [];
        $user->assignRole($roles);
        $user->syncPermissions($permissions);
        //Event recording
        $href = route('users.edit', $user->id);
        $userInfo = $user->nome . '[' .$user->email. ']';
        CommonController::recordUserEventLog(__('events.user_create'), "<a href='$href' target='_blank'>$userInfo</a> ".__('events.user_created').'.');
        //
        return redirect()->route('users.index')->with('success', __('global.msg.operation_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $pageTitle = __("cruds.user.title");
        $rolePermissions = CommonController::getRolePermissions();
        $permissions = CommonController::getPermissions();
        $level = [__("global.operator"), __("global.master")];
        $status = [__("global.pending"), __("global.approved"), __("global.reject")];

        return view('pages.users.edit', compact('pageTitle', 'user', 'rolePermissions', 'permissions', 'status', 'level'));
    }

    /**
     * Update User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rule = [
            'nome' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'cpf' => 'required|min:11|max:14',
            'nivel' => 'required',
            'roles' => 'required',
            'status' => 'required',
            'permissions' => 'required',
        ];

        if (is_null($request->password) || empty($request->password)) {
            $request->request->remove('password');
        }
        $this->validate($request, $rule);

        if ($request->hasFile('photo')) {
            if(!is_null($user->avatar) && !empty($user->avatar))
                Storage::delete("images/avatars/".$user->avatar);

            $image      = $request->file('photo');
            $fileName   = time() . '.' . 'png';

            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            $image->scale(width: 120);
            // save modified image in new format
            if (!Storage::exists('images/avatars')) {
                Storage::makeDirectory('images/avatars');
            }
            $image->toPng()->save(storage_path("app/public/images/avatars/$fileName"));
            $request->request->add(['avatar' => $fileName]); //add request
        }

        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $permissions = $request->input('permissions') ? $request->input('permissions') : [];
        $user->syncRoles($roles);
        $user->syncPermissions($permissions);
        //Event recording
        $href = route('users.edit', $user->id);
        $userInfo = $user->nome . '[' .$user->email. ']';
        CommonController::recordUserEventLog(__('events.user_update'), "<a href='$href' target='_blank'>$userInfo</a> ".__('events.user_updated').'.');
        //
        return redirect()->route('users.index')->with('success', __('global.msg.operation_success'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!auth()->user()->hasAnyPermission(['main_access', 'all_access'])) {
            abort(403);
        }

        if(!is_null($user->avatar) && !empty($user->avatar))
            Storage::delete("images/avatars/".$user->avatar);

        //Event recording
        $href = route('users.edit', $user->id);
        $userInfo = $user->nome . '[' .$user->email. ']';
        CommonController::recordUserEventLog(__('event.user_delete'), "<b>$userInfo</b> ". __('events.user_deleted').'.');
        //
        $user->delete();

        return redirect()->route('users.index')->with('success', __('global.msg.operation_success'));
    }
}
