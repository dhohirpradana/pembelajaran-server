<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = DB::table("tugas")->get();    
        return view("tugas.index", compact("tugas"));
    }

    public function store(Request $request)
    {
        DB::table("tugas")->insert([
            "name"  => $request->name
        ]);

        return redirect("/tugas")->with("msg", "tugas berhasil ditambahkan");
    }

    public function destroy($id)
    {
        DB::table("tugas")->where("id", $id)->delete();

        return redirect("/tugas")->with("msg", "tugas berhasil dihapus");
    }
}
