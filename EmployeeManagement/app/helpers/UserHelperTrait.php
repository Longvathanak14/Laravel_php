<?php
namespace App\Helpers;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

trait UserHelperTrait{

    use RegistersUsers;

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'email','max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'], 
        ]);
    }
    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data[ 'name'],
            'email' => $data[ 'email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}