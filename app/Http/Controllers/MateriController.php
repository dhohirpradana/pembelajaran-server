<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MateriController extends Controller
{
    public function index()
    {
        $materi = DB::table("materi")->orderBy("id", "ASC")->get();

        return view("materi.index", compact("materi"));
    }

    public function create()
    {
        return view("materi.create");
    }

    public function store(Request $request)
    {
        $id = DB::table('materi')->insertGetId(
            [
                'title' => $request->title,
                'konten' => $request->konten
            ]
        );

        foreach ($request->image as $gambar) {
            $extension = $gambar->extension();

            $name = "images/" . Str::random(20) . time() . "." . $extension;

            $gambar->storeAs(
                'public/',
                $name
            );

            DB::table("detail_materi")->insert([
                "image" => $name,
                "materi_id" => $id
            ]);
        }

        return redirect("/materi")->with("msg", "materi berhasil ditambahkan");
    }

    public function show($id)
    {
        $materi = DB::table("materi")
            ->where("materi.id", $id)
            ->first();

        if (empty($materi)) abort(404);

        $detail_materi = DB::table("detail_materi")
            ->where("materi_id", $materi->id)
            ->get();

        return view("materi.show", compact("materi", "detail_materi"));
    }
}
