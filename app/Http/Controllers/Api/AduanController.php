<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aduan;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    public function getAduan(Request $request)
    {
        $aduan = Aduan::all();
        return response([
            'message' => "Berhasil mendapatkan data!",
            'data' => $aduan,
        ], 200);
    }
}
