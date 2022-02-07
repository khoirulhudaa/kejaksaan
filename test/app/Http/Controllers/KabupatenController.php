<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    protected $customMessages = [
        'required' => 'Please input the :attribute.',
        'unique' => 'This :attribute has already been taken.',
        'max' => ':Attribute may not be more than :max characters.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(City::orderBy('city_name', 'ASC')->get())
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.kabupaten.index');
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        // 
    }

    public function destroy($id)
    {
        //
    }

    public function search()
    {
        $data = City::get();

        dd($data);

        return $data;
    }
}
