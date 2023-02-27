<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepRequest;

class DepartmentController extends Controller
{
    //
    public function index(){
        $departments=Department::all();
        return view("admin.departments.index",['deps'=>$departments]);
    }

    public function create(){
        return view("admin.departments.create");
    }

    public function store(StoreDepRequest $req){

        $dep=new Department;
        $dep->name=$req->name;
        $dep->description=$req->description;
        if($dep->save())
          return redirect("/admin/departments");
    }

    public function edit($id){
        $dep=Department::find($id);
        return view("admin.departments.edit",compact('dep'));
    }

    public function update(StoreDepRequest $req, $id){

        $dep=Department::find($id);
        $dep->name=$req->name;
        $dep->description=$req->description;
        if($dep->save())
        return redirect("/admin/departments");
    }
}
