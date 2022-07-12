<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\employee;
use App\Models\department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $department= department::all();

        if(auth('employee')->check()==null)
        return view('auth.register',compact('department'));
        else
        return redirect()->route('employee.index');

    }
    public function login()
    {

        try{

        if(auth('employee')->check()==null)
        return view('auth.login');
        else
        return redirect()->route('employee.index');

    }catch(\Exception $e)
    {
        return redirect()->back()->with(['error'=>__("messages.There's a mistake")]);

    }


    }
    public function LoginStore(Request $request)
    {
        if (auth('employee')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
           return redirect()->route('employee.index');
        }else
         return view('auth.login');
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


             if(isset($request->vaccinePhoto))
             {
                $imageName = saveImage('images', $request->vaccinePhoto);

             }else
             $imageName="";
            employee::create([

                'name'=>$request->name,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'department_id'=>$request->department,
                'date'=>$request->date,
                'vaccine'=>$request->vaccine,
                'Vaccinedate'=>$request->vaccinedate,
                'vaccinephoto'=>$imageName,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);



            if (auth('employee')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
             {
                return redirect()->route('employee.index');
             }else
             {
               return "r";
             }

            return redirect()->back()->with(['success' => __("successfully registered")]);

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
