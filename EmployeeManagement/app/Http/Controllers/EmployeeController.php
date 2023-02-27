<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreEmpRequest;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    public function index(Request $req)
    {
        $emps=Employee::with('department')->get();
        if($req->query("search")){
            $emps= Employee::where('first_name','LIKE','%'.$req->query("search").'%')
                              ->orWhere('last_name','LIKE','%'.$req->query("search").'%')
                              ->orWhere('email','LIKE','%'.$req->query("search").'%')
                              ->with('department')->get();
        }
        return view("index",compact("emps"));

    }

    public function create()
    {
        //
        $deps=Department::get(["id", "name", ]);
        return view("admin.employees.create",compact("deps"));
    }


    public function store(StoreEmpRequest $request)
    {

        $data=$request->except(['_token','photo']);
        $data['image_path']='';
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $image=time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs("employees/profile",$image,'public');
            $data['image_path']=$image;
        }
        if(Employee::create($data)){
            return redirect()->route('admin.employees.index')
                             ->with('message','New Employee created successfully');
        }
        return back();
    }

    public function show($id)
    {
        $emp=Employee::find($id);

        return view("admin.employees.details",compact("emp"));
    }


    public function edit($id)
    {
        $emp=Employee::find($id);
        $deps=Department::get(["id","name"]);
        return view("admin.employees.edit",compact("emp","deps"));
    }

    public function update(Request $request, $id)
    {
        $validators=Validator::make($request->all(),[
            'first_name'=> 'required|max:100',
            'last_name'=>'required|max:100',
            'department_id'=> 'required|integer',
        ]);

        if($validators->failed()) return back()->withErrors($validators);
        $data=$request->except(['_token','_method','id','photo']);
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $image=time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs("employees/profile",$image,'public');
            $data['image_path']=$image;
        }

        $result=Employee::where('id',$id)->update($data);
        if($result){
            return redirect()->route("admin.employees.index")
                   ->with('message','Employee updated successfully');
        }
        return back();
    }



    public function destroy($id)
    {
        $emp=Employee::findOrFail($id);
        if($emp->delete()){
            return redirect()->route('admin.employees.index')
            ->with('message','Employee deleted successfully');
        }
    }
}
