<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;

class DepartmentController extends Controller
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
        $title = "Department Page";
        //$data = ["Jeffar","Dimas","Rizki"];

        //$data = App\Department::all();

        $data = Department::all();

        //show with soft deleting
        // $data = Department::withTrashed()->get();

//        $data = DB::table('departments')->get();
        return view('departments/home',[
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
        $title = "Department Page";
        return view('departments/create',[
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

        //validation
        $validateData = $request->validate([
           'name' => 'required|min:5|max:20',
           'code' => 'required|unique:departments,code'
        ]);

        //CARA 1
        $data = new Department;
        $data->name = $request->name;
        $data->code = $request->code;
        $data->save();

        return redirect('/department');

        //CARA 2
//        Department::create([
//            'name' => $request->name,
//            'code' => $request->code
//        ]);
//
//        //CARA 3
//        DB::Table('departments')->insert([
//            'name' => $request->name,
//            'code' => $request->code,
//        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $judul = "Detail Department";
        $data = Department::where('id','=',$id)->first();
//        dd($data);
        return view('departments/show',['data'=>$data, 'judul'=>$judul]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = "Edit Department";
        $data = Department::where('id','=',$id)->first();
        return view('departments/edit',['data' => $data, 'judul' => $judul]);
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
        Department::where('id','=', $request->id)->update(
            [
                'name' => $request->name,
                'code' => $request->code
            ]
        );

        return redirect('/department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Department::find($id);

        //use softdeletes
        $data->delete();

        // Permanent Delete
        // $data->forceDelete();

        return redirect('/department');
    }
}
