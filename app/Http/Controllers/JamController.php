<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JamController extends Controller
{
    public function index()
    {
        $jam = DB::table("jam")->first();

        return view("jam.index", compact("jam"));
    }

    public function store(Request $request)
    {
        DB::table("jam")->truncate();

        DB::table("jam")->insert([
            "mulai"     => $request->mulai,
            "selesai"   => $request->selesai
        ]);

        return redirect("/jam")->with("msg","jam pembelajaran diperbarui");
    }
}
