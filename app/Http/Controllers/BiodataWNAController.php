<?php

namespace App\Http\Controllers;

use App\Models\BiodataWNA;
use App\Models\Negara;
use Illuminate\Http\Request;

class BiodataWNAController extends Controller
{
    protected $customMessages = [
        'required' => ':attribute harus diisi',
        'unique' => 'This :attribute has already been taken.',
        'max' => ':Attribute may not be more than :max characters.',
        'country_id.required' => 'Pilih Asal Negara.',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(BiodataWNA::with('country')
                ->orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('country', 'admin.wna.country')
                ->addColumn('action', 'admin.wna.action')
                ->rawColumns(['country', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        $country = Negara::orderBy('name')->get();
        return view('admin.wna.index', compact('country'));
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
            'pasport' => 'nullable|string|unique:biodata_w_n_a_s,pasport|max:50',
            'name' => 'required|string|unique:pekerjaans,name|max:50',
            'country_id' => 'nullable|integer|exists:negaras,id',
        ], $this->customMessages);

        $data = BiodataWNA::create([
            'pasport' => strip_tags(request()->post('pasport')),
            'name' => strip_tags(request()->post('name')),
            'country_id' => strip_tags(request()->post('country'))
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
        $data = BiodataWNA::findOrFail($id);

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
        $data = BiodataWNA::findOrFail($id);

        request()->validate([
            'pasport' => 'nullable|string|max:50',
            'name' => 'required|string|max:50',
            'country_id' => 'nullable|integer',
        ], $this->customMessages);

        $data->update([
            'pasport' => strip_tags(request()->post('pasport')),
            'name' => strip_tags(request()->post('name')),
            'country_id' => strip_tags(request()->post('country'))
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
        $data = BiodataWNA::destroy($id);

        return response()->json($data);
    }

    public function search()
    {
        $id = $_GET['id'];
        $data = BiodataWNA::with('country')->where('id', $id)->get();

        return $data;
    }
}
