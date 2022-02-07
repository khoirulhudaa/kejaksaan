<?php

namespace App\Http\Controllers;

use App\Models\KTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class B2 extends Controller
{
    public function index()
    {
        return view('admin.B2.index');
    }

    public function show($id)
    {
        $today = date('d F Y');
        $data  =  KTP::with(['getProvince', 'getCity', 'getDistrict', 'getSubdistrict'])
            ->select('*', 'subdis_id', DB::raw('count(*) as total'))
            ->groupBy('subdis_id')
            ->orderBy('created_at', 'ASC')
            ->get();
        $total = KTP::all()->count();

        $params = [
            'data' => $data,
            'date' => $today,
            'total' => $total
        ];
        // Tampilan Semua data berdasarkan Desa dan Jumlahkan
        return view('admin.B2.show')->with($params);
    }
}
