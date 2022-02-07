<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\KTP;
use App\Models\Province;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class F1 extends Controller
{
    public function index()
    {
        $params = [
            'ktp' => KTP::all(),
        ];
        $provinces = Province::orderBy('prov_name')->get();
        $cities = City::orderBy('city_name')->get();
        $districts = District::orderBy('dis_name')->get();
        $subdistricts = Subdistrict::orderBy('subdis_name')->get();
        return view('admin.F1.index', compact('provinces', 'cities', 'districts', 'subdistricts'))->with($params);
    }


    public function store(Request $request)
    {
        $params = [
            'calon' => request()->post('name'),
            'desa' => request()->post('desa'),
        ];
        return view('admin.F1.filter')->with($params);
    }

    public function list()
    {
        $data = KTP::with(['getProvince', 'getCity', 'getDistrict', 'getSubdistrict'])->where('subdis_id', request()->post('desa'))->get();

        $today = date('d F Y');

        $params = [
            'calon'     => request()->post('calon'),
            'ktp'       => $data,
            'date'      => $today
        ];

        return view('admin.F1.show')->with($params);
    }

    public function lampiran()
    {
        $data = KTP::with(['getProvince', 'getCity', 'getDistrict', 'getSubdistrict'])->where('subdis_id', request()->post('desa'))->get();

        $params = [
            'ktp'       => $data,
        ];

        return view('admin.F1.lampiran')->with($params);
    }
}
