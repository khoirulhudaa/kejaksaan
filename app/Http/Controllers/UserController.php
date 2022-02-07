<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(User::with('role')->whereNotIn('id', [1, 4])->orderBy('updated_at', 'DESC')->get())
                ->addColumn('role', 'admin.users.role')
                ->addColumn('action', 'admin.users.action')
                ->rawColumns(['role', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        $role  = Role::orderBy('name')->get();
        return view('admin.users.index', compact('role'));
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
        $data = User::create([
            'name'          => strip_tags(request()->post('name')),
            'email'         => strip_tags(request()->post('email')),
            'role_id'       => request()->post('role_id'),
            'password'      => bcrypt(request()->post('password')),
            'profile_url'   => 'admin.jpg',
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
        $data = User::findOrFail($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = User::findOrFail($id);

        $data->update([
            'name'          => strip_tags(request()->post('name')),
            'email'         => strip_tags(request()->post('email')),
            'role_id'       => request()->post('role_id'),
            'password'      => bcrypt(request()->post('password')),
            'profile_url'   => 'admin.jpg',
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
        $data = User::destroy($id);

        return response()->json($data);
    }
}
