<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    public function index()
    {
        $soal = DB::table("game_soal")->orderBy("id", "DESC")->get();

        return response()->json(["data" => $soal]);
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

        return response()->json([
            "data" => [
                "soal"          => $soal,
                "game_jawaban" => $game_jawaban
            ]
        ]);
    }
}
