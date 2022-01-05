<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function index()
    {
        $game = DB::table("game_soal")->orderBy("id", "ASC")->get();

        return view("game.index", compact("game"));
    }

    public function create()
    {
        return view("game.create");
    }

    public function store(Request $request)
    {
        $name = "images/" . Str::random(20) . time() . ".jpg";

        $request->file("image")->storeAs(
            'public/',
            $name
        );

        $id = DB::table('game_soal')->insertGetId([
                'name' => $request->name,
                "gambar" => $name
            ]);

        for ($i=0; $i < count($request->jawaban); $i++) { 

            if ($request->benar == $i) {
                DB::table('game_jawaban')->insert([
                    'jawaban'           => $request->jawaban[$i],
                    "benar"             => 1,
                    "game_soal_id"      => $id
                ]);
            }else{
                DB::table('game_jawaban')->insert([
                    'jawaban'           => $request->jawaban[$i],
                    "benar"             => 0,
                    "game_soal_id"      => $id
                ]);
            }
        }

        return redirect("/game")->with("msg", "game berhasil ditambahkan");
    }

    public function show($id)
    {
        $soal = DB::table("game_soal")
            ->where("game_soal.id", $id)
            ->first();

        if (empty($soal)) abort(404);

        $game_jawaban = DB::table("game_jawaban")
        ->where("game_soal_id", $soal->id)
        ->get();

        return view("game.show", compact("soal", "game_jawaban"));
    }

    public function destroy($id)
    {
        $soal = DB::table("game_soal")
            ->where("game_soal.id", $id)
            ->delete();

        return redirect("/game")->with("msg", "game berhasil di hapus");
    }
}
