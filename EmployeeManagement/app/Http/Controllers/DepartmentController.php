<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Http\Requests\StoreDepRequest;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $departments=Department::all();
        return view("departments.index",['deps'=>$departments]);        
    }

    public function create(){
        return view("departments.create");
    }

    public function store(StoreDepRequest $req){
        
        $dep=new Department;
        $dep->name=$req->name;
        $dep->description=$req->description;
        if($dep->save())
          return redirect("/departments");
    }

    public function edit($id){
        $dep=Department::find($id);
        return view("departments.edit",compact('dep'));
    }

    public function update(StoreDepRequest $req, $id){
        
        $dep=Department::find($id);
        $dep->name=$req->name;
        $dep->description=$req->description;
        if($dep->save())
        return redirect("/departments");
    }
    
}
