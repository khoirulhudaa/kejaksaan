<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    protected $customMessages = [
        'required' => 'Please input the :attribute.',
        'unique' => 'This :attribute has already been taken.',
        'max' => ':Attribute may not be more than :max characters.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(District::with('city')->orderBy('created_at', 'ASC')->get())
                ->addColumn('city', 'admin.kecamatan.city')
                ->addColumn('action', 'admin.kecamatan.action')
                ->rawColumns(['city', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        $cities = City::orderBy('city_name')->get();
        return view('admin.kecamatan.index', compact('cities'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        request()->validate([
            'kabupaten' => 'required',
            'name' => 'required|string|unique:districts,dis_name|max:50',
        ], $this->customMessages);

        $data = District::create([
            'dis_name' => strip_tags(request()->post('name')),
            'city_id' => strip_tags(request()->post('kabupaten')),
        ]);

        return response()->json($data);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = District::findOrFail($id);

        return response()->json($data);
    }


    public function update(Request $request, $id)
    {
        $data = District::findOrFail($id);

        request()->validate([
            'kabupaten' => 'required',
            'name' => "required|string|unique:districts,dis_name,{$data->dis_name},dis_name|max:50",
        ], $this->customMessages);

        $data->update([
            'dis_name' => strip_tags(request()->post('name')),
            'city_id' => strip_tags(request()->post('kabupaten')),
        ]);

        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = District::destroy($id);

        return response()->json($data);
    }

    public function search()
    {
        $id = $_GET['id'];
        $data = District::where('city_id', $id)->get();

        return $data;
    }
}
