<?php

namespace App\Http\Controllers;

use App\Models\TinggaSementaraWNA;
use Illuminate\Http\Request;

class TinggalSementaraWNAController extends Controller
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
            return datatables()->of(TinggaSementaraWNA::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.tinggal-sementara.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.tinggal-sementara.index');
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
            'name' => 'required|string|unique:tingga_sementara_w_n_a_s,name|max:50',
        ], $this->customMessages);

        $data = TinggaSementaraWNA::create([
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
        $data = TinggaSementaraWNA::findOrFail($id);

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
        $data = TinggaSementaraWNA::findOrFail($id);

        request()->validate([
            'name' => "required|string|unique:tingga_sementara_w_n_a_s,name,{$data->name},name|max:50",
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
        $data = TinggaSementaraWNA::destroy($id);

        return response()->json($data);
    }
}
