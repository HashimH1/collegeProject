<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\department;
use App\Models\statistic;
use App\Models\employee;
class statistic extends Model
{
    use HasFactory;

    protected $table="statistics";

    protected $guarded=[];


    public function employee()
    {
        return $this->hasOne(employee::class,'id','employee_id');
    }
    public function statistics()
    {
        return $this->belongsTo(employee::class,'id','employee_id');
    }

}

