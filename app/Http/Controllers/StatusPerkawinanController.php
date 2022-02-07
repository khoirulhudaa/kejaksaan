<?php

namespace App\Http\Controllers;

use App\Models\StatusPerkawinan;
use Illuminate\Http\Request;

class StatusPerkawinanController extends Controller
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
            return datatables()->of(StatusPerkawinan::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.status-perkawinan.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.status-perkawinan.index');
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
            'name' => 'required|string|unique:status_perkawinans,name|max:50',
        ], $this->customMessages);

        $statusPerkawinan = StatusPerkawinan::create([
            'name' => strip_tags(request()->post('name')),
        ]);

        return response()->json($statusPerkawinan);
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
        $statusPerkawinan = StatusPerkawinan::findOrFail($id);

        return response()->json($statusPerkawinan);
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
        $statusPerkawinan = StatusPerkawinan::findOrFail($id);

        request()->validate([
            'name' => "required|string|unique:status_perkawinans,name,{$statusPerkawinan->name},name|max:50",
        ], $this->customMessages);

        $statusPerkawinan->update([
            'name' => strip_tags(request()->post('name')),
        ]);

        return response()->json($statusPerkawinan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusPerkawinan = StatusPerkawinan::destroy($id);

        return response()->json($statusPerkawinan);
    }
}
