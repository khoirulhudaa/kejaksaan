<?php

namespace App\Http\Controllers;

use App\Models\BiodataWNI;
use App\Models\Kecamatan;
use App\Models\Perikanan;
use Illuminate\Http\Request;

class PerikananController extends Controller
{
    protected $customMessages = [
        'required' => 'Please input the :attribute.',
        'unique' => 'This :attribute has already been taken.',
        'max' => ':Attribute may not be more than :max characters.',
        'biodata_id.required' => 'Please select Districts.',
        'kecamatan_id.required' => 'Please select Districts.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Perikanan::with('kecamatan', 'biodata')
                ->orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('biodata', 'admin.perikanan.biodata')
                ->addColumn('kecamatan', 'admin.perikanan.kecamatan')
                ->addColumn('action', 'admin.Perikanan.action')
                ->rawColumns(['biodata', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        $kecamatan  = Kecamatan::orderBy('name')->get();
        $biodata    = BiodataWNI::orderBy('name')->get();
        return view('admin.perikanan.index', compact('kecamatan', 'biodata'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        request()->validate([
            'locus'         => 'required|string',
            'kecamatan'     => 'nullable|integer|exists:kecamatans,id',
            'ket'           => 'nullable|string',
        ], $this->customMessages);

        $data = Perikanan::create([
            'locus'         => strip_tags(request()->post('locus')),
            'kecamatan_id'  => strip_tags(request()->post('kecamatan')),
            'ket'           => strip_tags(request()->post('ket')),
        ]);

        return response()->json($data);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Perikanan::findOrFail($id);

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Perikanan::findOrFail($id);


        request()->validate([
            'locus'         => 'required|string',
            'kecamatan'     => 'nullable|integer|exists:kecamatans,id',
            'ket'           => 'nullable|string',
        ], $this->customMessages);

        $data->update([
            'locus'         => strip_tags(request()->post('locus')),
            'kecamatan_id'  => strip_tags(request()->post('kecamatan')),
            'ket'           => strip_tags(request()->post('ket')),
        ]);

        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Perikanan::destroy($id);

        return response()->json($data);
    }
}
