<?php

namespace App\Http\Controllers;

use App\Models\WargaNegara;
use Illuminate\Http\Request;

class WargaNegaraController extends Controller
{
    protected $customMessages = [
        'required' => 'Please input the :attribute.',
        'unique' => 'This :attribute has already been taken.',
        'max' => ':Attribute may not be more than :max characters.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(WargaNegara::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.warga-negara.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.warga-negara.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|string|unique:warga_negaras,name|max:50',
        ], $this->customMessages);

        $wargaNegara = WargaNegara::create([
            'name' => strip_tags(request()->post('name')),
        ]);

        return response()->json($wargaNegara);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wargaNegara = WargaNegara::findOrFail($id);

        return response()->json($wargaNegara);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wargaNegara = WargaNegara::findOrFail($id);

        request()->validate([
            'name' => "required|string|unique:warga_negaras,name,{$wargaNegara->name},name|max:50",
        ], $this->customMessages);

        $wargaNegara->update([
            'name' => strip_tags(request()->post('name')),
        ]);

        return response()->json($wargaNegara);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wargaNegara = WargaNegara::destroy($id);

        return response()->json($wargaNegara);
    }
}
