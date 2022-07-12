<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\Role;
use App\Models\department;
use App\Models\headOfDepartment;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


          $employees= employee::select('name','id','email')->whereHas('HOdepartment')->with('HOdepartment')->paginate();

        $employees[0]->HOdepartment[0]->department;
        return view('employee.admin.admins.index',compact('employees'));
        // ([''=>function($qure){
        //      $qure->select('name','email','id');
        // }])->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department =department::select('id','name')->get();
        $employees=employee::select('id','name','email')->get();
        return view('employee.admin.admins.create',compact('employees','department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{



           $HOD= headOfDepartment::where('employee_id',$request->employee_id)->get();

           if(isset($HOD[0]->employee_id))
           {
              headOfDepartment::where('employee_id',$request->employee_id)->delete();
              $employee= employee::find($request->employee_id);
              $employee->detachRole(2);
           }

           if(isset($request->department_id))
          {
        foreach ($request['department_id'] as  $requ) {

            $data[]=[
                'employee_id'=>$request->employee_id,
                'department_id'=>$requ,
            ];
        }

        headOfDepartment::insert($data);

        $employee= employee::find($request->employee_id);


        $employee->attachRole(2);
          }

        // $employee->detachRole(2);
        return redirect()->back()->with(['success' => __("Permissions granted")]);

    }catch(\Exception $e)
    {
        return redirect()->back()->with(['error'=>__("messages.There's a mistake")]);

    }
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
        //
    }
}
