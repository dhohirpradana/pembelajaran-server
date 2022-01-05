<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = 
        DB::select(
            DB::raw("
            SELECT * FROM tugas WHERE NOT EXISTS
                (
                    SELECT NULL
                    FROM tugas_siswa 
                    WHERE tugas_siswa.tugas_id = tugas.id
                )
            ")
        );
        

        return response()->json([
            "data" => $tugas
        ]);
    }

    public function show($id)
    {
        $tugas = DB::table("tugas")->where("id", $id)->first();
        
        return response()->json([
            "data" => $tugas
        ]);
    }

    public function store(Request $request)
    {
        # code...
    }
}
