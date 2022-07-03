<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;


class UserController extends Controller
{
    public function index(){
        
        // $users = User::get();
        // return view('admin.user.index', compact('users'));
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        // $roles = Role::get();
        // return view('admin.user.create', compact('roles'));
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.user.create', compact('roles'));

    }

    public function store(Request $request)
    {
        // $user = User::create($request->all());
        // $user->update(['password'=> Hash::make($request->password)]);
        // $user->roles()->sync($request->get('roles'));
        // return redirect()->route('users.index');
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email,',
            'password'=>'required|same:confirm-password',
            'roles'=>'required'
        ]);
        $input = $request->all();
        $input['password']=Hash::make($input['password']);
        
        $user=User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index');
    }
    public function show(User $user)
    {
        $total_purchases = 0;
        foreach ($user->sales as $key =>  $sale) {
            $total_purchases+=$sale->total;
        }
        $total_amount_sold = 0;
        foreach ($user->purchases as $key =>  $purchase) {
            $total_amount_sold+=$purchase->total;
        }
        return view('admin.user.show', compact('user', 'total_purchases', 'total_amount_sold'));
    }
    public function edit($id)
    {
        // $roles = Role::get();
        // return view('admin.user.edit', compact('user', 'roles'));
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin.user.edit', compact('user', 'roles', 'userRole'));

    }
    public function update(Request $request, $id)
    {
        // if ($user->id == 1) {
        //     return redirect()->route('users.index');
        // }else{
            // $user->update($request->all());
            // $user->roles()->sync($request->get('roles'));


            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'same:confirm-password',
                'roles' => 'required'
            ]);
        
            $input = $request->all();
            if(!empty($input['password'])){ 
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = Arr::except($input,array('password'));    
            }
        
            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
        
            $user->assignRole($request->input('roles'));
        
            return redirect()->route('users.index');
        
    }
    public function destroy($user)
    {
        // if ($user->id == 1) {
        //     return back();
        // } else {
        //     $user->delete();
        //     return back();
        // }
        User::find($user)->delete();
        return redirect()->route('users.index');
    }

}
