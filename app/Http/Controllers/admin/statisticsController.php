<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\department;
use App\Models\statistic;
use App\Models\headOfDepartment;
class statisticsController extends Controller
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
            $statistics=  statistic::orderBy('id','DESC')-> with(['employee' => function ($query) {
                $query->select('id', 'name','phone');
            }])->paginate(30);

            return view('employee.admin.employee.statistics',compact('statistics'));
        }



        $department=headOfDepartment::where('employee_id',auth()->user()->id)->select('department_id')->get();

        if(isset($department[0]))
        {
             foreach($department as $object)
             {
                 $arrays[] = $object->department_id;
             }

             $statistics=  statistic::orderBy('id','DESC')->whereHas('employee',function($query)use($arrays){
                $query->select('name','phone','id')->whereIn('department_id',$arrays);
            })->with('employee',function($query){
                $query->select('name','phone','id');
            })->paginate(30);

            $admin="true";
            return view('employee.admin.employee.statistics',compact('statistics','admin'));
        }
    }


    public function statSearch(Request $request)
    {

        try {

           if(isset($request->day) )
           {
            $day =$request->day;
            $dayAttendance=$request->dayAttendance;

                $employees = employee::select('id','name','email')->with(['statistics'=>function($query)use($day){
                $query->where('created_at', '>', now()->subDays($day)->endOfDay())->get();
               }])->paginate(2);


               $mask=0;
               $temperature=0;
               $loop=0;

               foreach ($employees as $key => $employee) {

                foreach ($employee->statistics as $key => $stat) {

                    $mask +=$stat->mask;
                    $temperature +=$stat->temperature;
                    $loop +=$key;

               }
                $statistics[]=[

                    'name'=>$employee->name,
                    'email'=>$employee->email,
                    'Attendance'=> count($employee->statistics),
                    'mask'=>$mask,
                    'temperature'=>$temperature / count($employee->statistics),

                 ];
                 $mask=0;
                 $temperature=0;
                 $loop=0;
                }
                return view('employee.admin.employee.statSearch',compact('statistics','employees'));

            }

            return view('employee.admin.employee.statSearch');

        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function statSearchGet(Request $request)
    {



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
        //
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

           statistic::where('employee_id',$id)->delete();

           return redirect()->route('employee.index');
        }
    }
}
