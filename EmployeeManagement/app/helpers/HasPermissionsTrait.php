<?php
namespace App\Helpers;
use App\Models\Permission;
use App\Models\Role;

trait HasPermissionsTrait{
    public function givePermissionsTo(...$permissions){
        $permissions = $this->getAllPermissions($permissions);
        dd($permissions);
        if($permissions === null){
            return $this;
        }
        $this->permissions ()-> saveMany($permissions);
        return ;
    }
    public function withdrawPermissionsTo(...$permissions){
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions ()-> detach($permissions);
        return $this;
    }
    public function refreshPermissions(...$permissions){
        $this->permissions()->detach();
        return $this->givePermissionTo($permissions);
    }
    public function hasPermissionTo($permission){
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }
    public function hasPermissionThroughRole($permission){
        foreach($permission->roles as $role){
            if($this->roles->contains($role)){
                return true;
            }
            return false;
        }
    }

    public function hasRole(...$roles){
        foreach( $roles as $ $role){
            if($this->roles->contains('slug', $role)){
                return true;
            }
            return false;
        }
    }
    public function assignRoles($role=[]){
        $this->roles()->sync($role);
    }
    public function roles(){
        return $this ->belongsToMany(Role::class,'users_roles');
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class,'users_permissions');
    }
    protected function hasPermission($permission)
    {
        return (bool) $this-> $this -> permissions->where('slug',$permission->slug)->count();
    }
    protected function getAllPermissions(array $permissions){
        return Permission::whereIn('slug',$permissions)->get();
    }
}