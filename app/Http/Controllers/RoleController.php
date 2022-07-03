<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    //     $this->middleware('can:roles.create')->only(['create','store']);
    //     $this->middleware('can:roles.index')->only(['index']);
    //     $this->middleware('can:roles.edit')->only(['edit','update']);
    //     $this->middleware('can:roles.show')->only(['show']);
    //     $this->middleware('can:roles.destroy')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::get();
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        // $role = Role::create($request->all());
        // $role->permissions()->sync($request->get('permissions'));
        // return redirect()->route('roles.index');

        $this->validate($request, ['name'=>'required', 'permission'=>'required']);
        $role = Role::create(['name'=>$request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');

    }
    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.role.edit', compact('role', 'permission','rolePermissions'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index');

    }
    public function destroy(Role $role)
    {
        $role->delete();
        // return back();
       // DB::table('roles')->where('id', $role)->delete();
        return redirect()->route('roles.index');
    }
}
