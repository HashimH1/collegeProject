<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laratrust\Traits\LaratrustUserTrait;
use App\Models\department;
use App\Models\statistic;

use App\Models\headOfDepartment;
class employee extends Authenticatable
{
    use HasFactory;
    use LaratrustUserTrait;
    protected $table="employee";

    protected $guarded=[];

    public function department()
    {
        return $this->hasOne(department::class,'id','department_id');
    }

    public function statistics()
    {
        return $this->hasMany(statistic::class,'employee_id','id');
    }

    public function HOdepartment()
    {
        return $this->hasMany(headOfDepartment::class,'employee_id','id')->with('department');
    }



}
