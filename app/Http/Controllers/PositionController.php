<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Position Page";
//        $data = DB::table('positions')->get();
        $data = Position::all();
        return view('positions/home',[
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
        $department = Department::all();
        $title = "Position Page";
        return view('positions/create',[
            "judul" => $title,
            'data' => $department,

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
        Position::create([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'code' => $request->code
        ]);

        return  redirect('/position');
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
        $title = "Halaman Position";
        $data = Position::where('id','=',$id)->first();
        $department = Department::all();

        return view('positions/edit',[
           "judul" => $title,
           "data" => $data,
           "department" => $department
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
        Position::where('id','=',$req->id)->update([
                'name' => $req->name,
                'code' => $req->code,
                'department_id' => $req->department_id,
            ]);
        return redirect('/position');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Position::find($id);

        //use softdeletes
        $data->delete();

        //permanenet delete
        //$data->forceDelete();

        return redirect('/position');
    }
}
