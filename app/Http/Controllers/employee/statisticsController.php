<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\statistic;
use Illuminate\Support\Carbon;
use DB;
class statisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $date = \Carbon\Carbon::today()->subDays(7);
        // return  $users = statistic::where('created_at','>=',$date)->get();


      $statistic = statistic::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->select(DB::raw('sum(mask)mask , sum(temperature)temperature ,sum(Attendance)Attendance  '))->where('employee_id',auth()->user()->id)->get();

      $statistics = statistic::orderBy('id','desc')->take(30)->where('employee_id',auth()->user()->id)->get();;

      //  return response()->json(['data'=>$employee]);
        return view('employee.pages.index',compact('statistics','statistic'));

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


        $id = employee::select('id')->where('email',$request->email)->get();

           if(isset($id[0]->id))
           {

            $CheckEmployee= statistic::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->where('employee_id',$id[0]->id)->get();

            if(isset($CheckEmployee[0]->id))
            {
              return response()->json(['code'=>'401','msg'=>'Already registered']);

            }



              statistic::create([
                'employee_id'=>$id[0]->id,
                'mask' =>$request->mask==null ?0:$request->mask,
                'temperature' =>$request->temperature==null ?0:$request->temperature,
                'Attendance' =>$request->Attendance==null ?0:$request->Attendance,
              ]);

              return response()->json(['code'=>'200','msg'=>'done successfully']);

           }
           else
           {
            return response()->json(['code'=>'401','msg'=>'This person does not exist']);

           }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $statistics = statistic::orderBy('id','desc')->take(30)->where('employee_id',auth()->user()->id)->paginate(30);

        return view('employee.pages.statistics',compact('statistics'));
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
        //
    }
}
