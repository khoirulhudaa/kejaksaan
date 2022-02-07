<?php

namespace App\Http\Controllers;

use App\Models\KTP;
use Illuminate\Http\Request;

class B1 extends Controller
{
    public function index()
    {
        $params = [
            'ktp' => KTP::all()
        ];
        return view('admin.B1.index')->with($params);
    }

    public function show($id, Request $request)
    {
        $ktp = KTP::with(['getProvince', 'getCity', 'getDistrict', 'getSubdistrict'])->where('id', $request->ktp_id)->first();
        if ($ktp == null) return redirect()->back()->with('alert-faield', 'Data ktp tidak ditemukan');

        $today = date('d F Y');

        $params = [
            'ktp' => $ktp,
            'date' => $today
        ];
        return view('admin.B1.show')->with($params);
    }
}
