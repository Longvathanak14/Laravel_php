<?php
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(UserController::class)->group(function(){

    Route::prefix("users")->group(function (){
      Route::get("/","index");
      Route::get("permissions",'index_permission');
      Route::get("permissions/create",'create_permission');
      Route::post("permissions/create",'store_permission');
      Route::get("permissions/edit/{id}",'edit_permission');
      Route::put("permissions/edit/{id}",'update_permission');
      Route::get("roles", 'index_roles');
      Route::get("roles/create", 'create_role');
      Route::post("roles/create",'store_role');
      Route::get("roles/edit/{id}",'edit_role');
      Route::put("roles/edit/{id}",'update_role');
      Route::get("roles/assign/permissions/{id?}","assign_permission");
      Route::post("roles/assign/permissions/{id?}","assigns_permission");
      Route::get("assign/roles/{id?}","assign_role");
      Route::post("assign/roles/{id?}","assigns_role");
      Route::get("create","create_user");
      Route::post("create","store_user")->name("create_user");
    
    }); 
    
    
    Route::middleware('auth')->group(function(){

        Route::get("/",[EmployeeController::class,'index']);
        Route::resource('employees', EmployeeController::class);
        Route::controller(DepartmentController::class)->group(function(){
            Route::prefix("departments")->group(function(){
                Route::get("/","index");
                Route::get("create","create");
                Route::post("create","store");
                Route::get("edit/{id}", "edit");
                Route::put("edit/{id}", "update");
            });
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
