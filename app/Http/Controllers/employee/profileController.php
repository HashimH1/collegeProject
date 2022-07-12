<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\department;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee= employee::find(auth()->user()->id);
        $department= department::all();

        return view('employee.pages.editProfile',compact('employee','department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function update(Request $request)
    {
        try {


             $employee= employee::find($request->id);

             if(isset($request->vaccinePhoto))
             {
                $imageName = saveImage('images', $request->vaccinePhoto);
                $employee->update([
                    'vaccinephoto'=>$imageName
                ]);
             }

             $employee->update($request->except('vaccinePhoto'));

            return redirect()->back()->with(['success' => __("Data has been updated")]);

        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>__("messages.There's a mistake")]);

        }
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

    public function logout()
    {
        Auth()->logout();
        return redirect()->route('employee.login');
    }
}
