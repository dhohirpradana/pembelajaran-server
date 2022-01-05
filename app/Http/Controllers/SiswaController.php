<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswa = DB::table("siswa")->get();

        return view("siswa.index", compact("siswa"));
    }

    public function create()
    {
        return view("siswa.create");
    }

    public function store(Request $request)
    {
        $siswa = DB::table("siswa")->insert([
            "name"          => $request->name,
            "nik"           => $request->nik,
            "password"      => Hash::make($request->password),
            "tanggal_lahir" => $request->tanggal_lahir,
            "jekel"         => $request->jekel,
            "nama_ortu"     => $request->nama_ortu,
            "alamat"        => $request->alamat,
            "whatsapp"      => $request->whatsapp,
        ]);

        return redirect("/siswa")->with("msg", "siswa berhasil ditambahkan");
    }

    public function update(Request $request, $id)
    {
        if ($request->password != '') {
            $siswa = DB::table("siswa")->where("id", $id)->update([
                "name"          => $request->name,
                "nik"           => $request->nik,
                "password"      => Hash::make($request->password),
                "tanggal_lahir" => $request->tanggal_lahir,
                "jekel"         => $request->jekel,
                "nama_ortu"     => $request->nama_ortu,
                "alamat"        => $request->alamat,
                "whatsapp"      => $request->whatsapp,
            ]);
        } else {
            $siswa = DB::table("siswa")->where("id", $id)->update([
                "name"          => $request->name,
                "nik"           => $request->nik,
                "tanggal_lahir" => $request->tanggal_lahir,
                "jekel"         => $request->jekel,
                "nama_ortu"     => $request->nama_ortu,
                "alamat"        => $request->alamat,
                "whatsapp"      => $request->whatsapp,
            ]);
        }

        return redirect("/siswa")->with("msg", "siswa berhasil diupdate");
    }

    public function destroy($id)
    {
        $siswa = DB::table("siswa")->where("id", $id)->delete();

        return redirect("/siswa")->with("msg", "siswa berhasil dihapus");
    }
}
