<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employee;
use App\Models\department;

class headOfDepartment extends Model
{
    use HasFactory;

    protected $table="head_of_department";

    protected $guarded=[];


    public function department()
    {
        return $this->hasOne(department::class,'id','department_id');
    }


}
