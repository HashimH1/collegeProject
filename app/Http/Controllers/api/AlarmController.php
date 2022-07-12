<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\alarm;
use App\Models\statistic;
use App\Models\employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class AlarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


    $day =$request->day;
    $dayAttendance=$request->dayAttendance;

        $employees = employee::select('id','name','email')->with(['statistics'=>function($query)use($day){
        $query->where('created_at', '>', now()->subDays($day)->endOfDay())->get();
       }])->get();


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
            'Attendance'=>count($employee->statistics),
            'mask'=>$mask,
            'temperature'=>$temperature / count($employee->statistics),

         ];
         $mask=0;
         $temperature=0;
         $loop=0;
        }


        return response()->json(['code'=>'200','statistics'=>$statistics]);




    // return count($employees[1]->statistics);
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
     * @param  \App\Models\alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function show(alarm $alarm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function edit(alarm $alarm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alarm $alarm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function destroy(alarm $alarm)
    {
        //
    }
}
