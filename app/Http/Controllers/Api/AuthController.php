<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $nik        = $request->input('nik');
        $password   = $request->input('password');
   
        $siswa = DB::table("siswa")->where('nik', '=', $nik)->first();
        
        if (!$siswa) {
           return response()->json(
               ['success'=>false, 'message' => 'Login Gagal, NIK salah!'], 200
            );
        }

        if (!Hash::check($password, $siswa->password)) {
           return response()->json(['success'=>false, 'message' => 'Login Gagal, password salah!'], 200);
        }

        // jika waktunya adalah jam sekarang maka silahkan masuk
        // jika waktunya tidak sekita waktunya maka tidak boleh masuk

        // $jam      = DB::table("jam")
        //             ->select("mulai", "selesai")
        //             ->first();

        // $now        = DateTime::createFromFormat('H:i:s', date("h:i:s"));

        // $mulai      = DateTime::createFromFormat('H:i:s', $jam->mulai);
        // $selesai    = DateTime::createFromFormat('H:i:s', $jam->selesai);
                    
        // if( $now < $mulai   ){
        //     return "benar";
        // }else{
        //     return "salah";
        // }

        return response()->json(['success'=>true,'message'=>'success', 'data' => $siswa], 200);
    }
}
