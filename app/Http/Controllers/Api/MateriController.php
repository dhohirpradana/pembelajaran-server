<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    public function index()
    {
        $materi = DB::table("materi")->orderBy("id", "DESC")->get();

        return response()->json(["data" => $materi]);
    }

    public function show($id)
    {
        $materi = DB::table("materi")->where("id", $id)->first();

        $detail_materi = DB::table("detail_materi")->where("materi_id", $id)->get();

        return response()->json([
            "data" => [
                "materi"        => $materi,
                "detail_materi" => $detail_materi
            ]
        ]);
    }
}
