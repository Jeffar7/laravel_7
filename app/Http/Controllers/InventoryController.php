<?php

namespace App\Http\Controllers;


use App\Archive;
use App\Department;
use App\Inventory;
use App\Position;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Inventory Page";
        $data = Inventory::all();
        return view('inventory/home', [
            "judul" => $title,
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        Inventory::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $last_inventory = Inventory::where('name',$request->name)->get()->last();

        Archive::create([
           'name' => $request->archive_name,
           'description' => $request->archive_description,
           'inventory_id' => $last_inventory->id
        ]);

        return  redirect('/inventory');
    }
    public function edit($id)
    {
        $title = "Ini Halaman Inventory";

        $data = Inventory::where('id', '=', $id)->first();
//        dd($data);

        return view('inventory/edit', [
            "judul" => $title,
            "data" => $data,
        ]);
    }

    public function show($id)
    {
        $title = "Detail Pengguna Inventory";
        $data = Inventory::where('id','=',$id)->first();
//        dd($data);
        return view('inventory/show',['data'=>$data, 'judul'=>$title]);
    }

    public function update(Request $request)
    {
        Inventory::where('id', '=', $request->id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

        return redirect('/inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Inventory::find($id);
        $data->Delete();
        return redirect('/inventory');
    }

}
