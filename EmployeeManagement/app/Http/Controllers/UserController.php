<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelperTrait;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use UserHelperTrait;

    public function __construct()
    {
        $this->middleware ('auth');
    }
    public function index(){
        $users = User::get();
        return view('users.index')->with("users", $users);
    }
    public function index_permission(){
        $permissions = Permission::get();
        return view('users.permissions.index')->with("permissions", $permissions);
    }
    public function create_permission(){
        $roles=Role::get();
        return view('users.permissions.create')->with("roles", $roles);
    }
    public function edit_permission($id){
        $permissions=Permission::query()->findOrFail($id);
        return view ("users.permissions.edit")->with("permissions",$permissions);;
    }
    public function update_permission(Request $request,$id){
        $permissions=$request->except('_token','_method');
        Permission::query()->where('id',$id)->update($permissions);
        return redirect("/users/permissions");
    }

    public function store_permission(Request $request){
        $p=$request->except('_token');
        Permission::create($p);
        return redirect("/users/permissions");
    }
    public function index_roles(){
        $roles=Role::with('permissions')->get();
        return view('users.roles.index')->with("roles",$roles);
    }
    public function create_role(){
        $permissions= Permission::get();
        return view('users.roles.create')->with("permissions",$permissions);
    }
    public function store_role(Request $request){
        $this->validate($request ,[
            'name' => 'required|min:3|unique:roles,name'
        ]);
        $role=$request->except(['_token','permissions']);
        $permissions=$request->input('permissions');
        $role=Role::query()->create($role);
        $role->assignPermissions($permissions);
        return redirect("/users/roles");
    }
    public function edit_role($id){
        $permissions=Permission::get();
        $role=Role::query()->findOrFail($id);
        return view ('users.roles.edit')->with("role",$role);
    }
    public function update_role(Request $request,$id){
        $p=$request->except('_token','_method');
        Role::query()->where('id',$id)->update($p);
        return redirect("/users/roles");
    }
    public function assign_role($id){
        $permissions= Permission::get();
        $roles=Role::query()->get();
        $user=User::query()->find($id);
        $user_roles=$user->roles->pluck('slug')->toArray();
        return view('users.assign')->with("user",$user)
                                    ->with("roles",$roles)
                                    ->with("user_roles",$user_roles)
                                    ->with("permissions",$permissions);
    }
    public function assigns_role(Request $request, $id){
        $roles=$request->input('roles');
        $user=User::query()->find($id);
        $user->AssignRoles($roles);
        return redirect("/users");

    }
    public function assign_permission($id=null){
        $permissions= Permission::query()->get();
        $role_permissions=Role::query()->find($id)->permissions->pluck('slug')->toArray();
        return view("users.roles.assigns",compact('permissions','role_permissions','id'));
    }
    public function assigns_permission(Request $request,$id){
        $permissions=$request->input('permission');
        $role=Role::query()->find($id);
        $role->permissions()->sync($permissions);
        return redirect('users/roles');
    }
    //Create a new user
    public function create_user(){
        $roles=Role::query()->get();
        return view('users.create',compact('roles'));
    }
    public function store_user(Request $request){
        $credentials=$request->only('name', 'email', 'password','password_confirmation');
        if($user=$this->createUser($credentials)){
            $roles=$request->input('roles');
            $user->assignRoles($roles);
            return redirect("/users");
        }
    }
}
