<?php

namespace App\Http\Controllers;

use App\Models\LegalitasPerkawinan;
use Illuminate\Http\Request;

class LegalitasPerkawinanController extends Controller
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
            return datatables()->of(LegalitasPerkawinan::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.legalitas.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.legalitas.index');
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
            'name' => 'required|string|unique:legalitas_perkawinans,name|max:50',
        ], $this->customMessages);

        $data = LegalitasPerkawinan::create([
            'name' => strip_tags(request()->post('name')),
        ]);

        return response()->json($data);
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
        $data = LegalitasPerkawinan::findOrFail($id);

        return response()->json($data);
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
        $data = LegalitasPerkawinan::findOrFail($id);

        request()->validate([
            'name' => "required|string|unique:legalitas_perkawinans,name,{$data->name},name|max:50",
        ], $this->customMessages);

        $data->update([
            'name' => strip_tags(request()->post('name')),
        ]);

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LegalitasPerkawinan::destroy($id);

        return response()->json($data);
    }
}
