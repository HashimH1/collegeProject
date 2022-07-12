<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\department;
use App\Models\statistic;
use App\Models\headOfDepartment;
use Illuminate\Support\Carbon;
use DB;
class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('super_admin'))
        {
            $employees= employee::orderBy('id','DESC')->with('department')->paginate(30);


            return view('employee.admin.employee.index',compact('employees'));
        }


       $department=headOfDepartment::where('employee_id',auth()->user()->id)->select('department_id')->get();

       if(isset($department[0]))
       {
            foreach($department as $object)
            {
                $arrays[] = $object->department_id;
            }
            $employees= employee::orderBy('id','DESC')->with('department')->whereIn('department_id',$arrays)->paginate(30);
            return view('employee.admin.employee.index',compact('employees'));

       }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statistics = statistic::orderBy('id','desc')->take(30)->where('employee_id',$id)->paginate(30);
        $statistic = statistic::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->select(DB::raw('sum(mask)mask , sum(temperature)temperature ,sum(Attendance)Attendance  '))->where('employee_id',auth()->user()->id)->get();
        $employee= employee::select('id','vaccine','Vaccinedate','vaccinephoto')->where('id',$id)->get();
        return view('employee.admin.employee.info',compact('statistics','statistic','employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(isset($id))
         {
            employee::find($id)->delete();

            return redirect()->route('employee.index');
         }
    }
}
