<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Department;
use App\Position;
use App\Employee;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Employee Page";
//        $data = DB::table('positions')->get();
        $data = Employee::all();
        return view('employee/home',[
            "judul" => $title,
            "data" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Position::all();
        $title = "Employee Page";
        return view('employee/create',[
            "judul" => $title,
            'position' => $position,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Employee::create([
            'name' => $request->name,
            'position_id' => $request->position_id,
            'nip' => $request->nip,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        return  redirect('/employee');
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
        $title = "Halaman Employee";
        $data = Employee::where('id','=',$id)->first();
        $position = Position::all();

        return view('employee/edit',[
            "judul" => $title,
            "data" => $data,
            "department" => $position
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        Employee::where('id','=',$req->id)->update([
            'name' => $req->name,
            'code' => $req->code,
            'department_id' => $req->department_id,
        ]);
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::find($id);

        //use softdeletes
        $data->delete();

        //permanenet delete
        //$data->forceDelete();

        return redirect('/employee');
    }
}
