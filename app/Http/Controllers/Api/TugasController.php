<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function store(Request $request, $id, $siswaId)
    {
        // foreach ($request->file("image") as $gambar) {
        $gambar = $request->file("image");
        $extension = $gambar->extension();
        $name = "images/" . Str::random(20) . time() . "." . $extension;
        $gambar->storeAs(
            'public/',
            $name
        );

        $query = DB::table("tugas_siswa")->insert([
            "link" => $name,
            "siswa_id"  => $siswaId,
            "tugas_id" => $id,
            "nilai" => 0
        ]);
        // }
        if ($query) {
            return response()->json([
                "data" => [
                    "success"          => true,
                    "message" => 'Berhasil upload'
                ]
            ]);
        } else {
            return response()->json([
                "data" => [
                    "success"          => false,
                    "message" => 'Gagal upload'
                ]
            ]);
        }
    }
}
