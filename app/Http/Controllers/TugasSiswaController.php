<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TugasSiswaController extends Controller
{
    public function index()
    {
        $tugas = DB::table("tugas_siswa")
            ->join("siswa", "tugas_siswa.siswa_id", "=", "siswa.id")
            ->join("tugas", "tugas_siswa.tugas_id", "=", "tugas.id")
            ->select(
                "tugas_siswa.id",
                "siswa.name AS siswa",
                "tugas.name AS tugas",
                "tugas_siswa.link AS link",
                "tugas_siswa.nilai AS nilai"
            )
            ->get();

        return view("tugas-siswa.index", compact("tugas"));
    }

    public function update(Request $request, $id)
    {

        $siswa = DB::table("tugas_siswa")->where("id", $id)->update([
            "nilai"          => $request->nilai,
        ]);

        return redirect("/tugas-siswa")->with("msg", "tugas berhasil dinilai");
    }
}
