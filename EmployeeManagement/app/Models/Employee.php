<?php

namespace App\Models;

use App\Helpers\HasPermissionsTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory,HasPermissionsTrait;
    protected $guarded=[];
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
