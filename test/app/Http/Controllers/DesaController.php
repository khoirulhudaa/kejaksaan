<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    protected $customMessages = [
        'required' => 'Please input the :attribute.',
        'unique' => 'This :attribute has already been taken.',
        'max' => ':Attribute may not be more than :max characters.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Subdistrict::with('district')->orderBy('created_at', 'ASC')->get())
                ->addColumn('district', 'admin.desa.district')
                ->addColumn('action', 'admin.desa.action')
                ->rawColumns(['district', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        $districts = District::orderBy('dis_name')->get();
        return view('admin.desa.index', compact('districts'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        request()->validate([
            'kecamatan' => 'required',
            'name' => 'required|string|unique:subdistricts,subdis_name|max:50',
        ], $this->customMessages);

        $data = Subdistrict::create([
            'subdis_name' => strip_tags(request()->post('name')),
            'dis_id' => strip_tags(request()->post('kecamatan')),
        ]);

        return response()->json($data);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Subdistrict::findOrFail($id);

        return response()->json($data);
    }


    public function update(Request $request, $id)
    {
        $data = Subdistrict::findOrFail($id);

        request()->validate([
            'kecamatan' => 'required',
            'name' => "required|string|unique:subdistricts,subdis_name,{$data->subdis_name},subdis_name|max:50",
        ], $this->customMessages);

        $data->update([
            'subdis_name' => strip_tags(request()->post('name')),
            'dis_id' => strip_tags(request()->post('kecamatan')),
        ]);

        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Subdistrict::destroy($id);

        return response()->json($data);
    }

    public function search()
    {
        $id = $_GET['id'];
        $data = Subdistrict::where('dis_id', $id)->get();

        return $data;
    }
}
