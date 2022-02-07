<?php

namespace App\Http\Controllers;

use App\Models\TIKOrganisasi;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class TIKOrganisasiController extends Controller
{
    protected $customMessages = [
        'required'              => ':attribute harus diisi',
        'unique'                => 'This :attribute has already been taken.',
        'integer'               => ':Attribute must be a number.',
        'min'                   => ':Attribute must be at least :min.',
        'max'                   => ':Attribute may not be more than :max characters.',
        'exists'                => 'Not found.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(TIKOrganisasi::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.organisasi.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.organisasi.index');
    }

    public function create()
    {
        return view('admin.organisasi.create');
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
            'nomor'                 => 'required|string',
            'nama'                  => 'required|string',
            'akte'                  => 'nullable|string',
            'status'                => 'nullable|string',
            'berdiri'               => 'nullable|date',
            'alamat'                => 'nullable|string',
            'phone'                 => 'nullable|string',
            'web'                   => 'nullable|string',
            'nama_pengurus'         => 'nullable|string',
            'kedudukan_pengurus'    => 'nullable|string',
            'periode_pengurus'      => 'nullable|string',
            'alamat_pengurus'       => 'nullable|string',
            'hp_pengurus'           => 'nullable|string',
            'kegiatan_kedalam'      => 'nullable|string',
            'kegiatan_keluar'       => 'nullable|string',
            'kegiatan'              => 'nullable|string',
        ], $this->customMessages);

        $data = new TIKOrganisasi();
        $data->nomor                    = strip_tags(request()->post('nomor'));
        $data->nama                     = strip_tags(request()->post('nama'));
        $data->akte                     = strip_tags(request()->post('akte'));
        $data->status                   = strip_tags(request()->post('status'));
        $data->berdiri                  = request()->post('berdiri');
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->web                      = strip_tags(request()->post('web'));
        $data->nama_pengurus            = strip_tags(request()->post('nama_pengurus'));
        $data->kedudukan_pengurus       = strip_tags(request()->post('kedudukan_pengurus'));
        $data->periode_pengurus         = strip_tags(request()->post('periode_pengurus'));
        $data->alamat_pengurus          = strip_tags(request()->post('alamat_pengurus'));
        $data->hp_pengurus              = strip_tags(request()->post('hp_pengurus'));
        $data->kegiatan_kedalam         = strip_tags(request()->post('kegiatan_kedalam'));
        $data->kegiatan_keluar          = strip_tags(request()->post('kegiatan_keluar'));
        $data->kegiatan                 = strip_tags(request()->post('kegiatan'));
        if (request()->hasFile('photo')) {
            $image = request()->file('photo');
            $imageName = request()->post('nama') . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/organisasi');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(300, 480)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        } else {
            $data->photo = 'default.jpg';
        }
        $data->save();

        return redirect()->route('admin.organisasi.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TIKOrganisasi::findOrFail($id);

        return view('admin.organisasi.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TIKOrganisasi::findOrFail($id);

        return view('admin.organisasi.edit', compact('data'));
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
        $data = TIKOrganisasi::findOrFail($id);
        request()->validate([
            'nomor'                 => 'required|string',
            'nama'                  => 'required|string',
            'akte'                  => 'nullable|string',
            'status'                => 'nullable|string',
            'berdiri'               => 'nullable|date',
            'alamat'                => 'nullable|string',
            'phone'                 => 'nullable|string',
            'web'                   => 'nullable|string',
            'nama_pengurus'         => 'nullable|string',
            'kedudukan_pengurus'    => 'nullable|string',
            'periode_pengurus'      => 'nullable|string',
            'alamat_pengurus'       => 'nullable|string',
            'hp_pengurus'           => 'nullable|string',
            'kegiatan_kedalam'      => 'nullable|string',
            'kegiatan_keluar'       => 'nullable|string',
            'kegiatan'              => 'nullable|string',
        ], $this->customMessages);

        $data->nomor                    = strip_tags(request()->post('nomor'));
        $data->nama                     = strip_tags(request()->post('nama'));
        $data->akte                     = strip_tags(request()->post('akte'));
        $data->status                   = strip_tags(request()->post('status'));
        $data->berdiri                  = request()->post('berdiri');
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->web                      = strip_tags(request()->post('web'));
        $data->nama_pengurus            = strip_tags(request()->post('nama_pengurus'));
        $data->kedudukan_pengurus       = strip_tags(request()->post('kedudukan_pengurus'));
        $data->periode_pengurus         = strip_tags(request()->post('periode_pengurus'));
        $data->alamat_pengurus          = strip_tags(request()->post('alamat_pengurus'));
        $data->hp_pengurus              = strip_tags(request()->post('hp_pengurus'));
        $data->kegiatan_kedalam         = strip_tags(request()->post('kegiatan_kedalam'));
        $data->kegiatan_keluar          = strip_tags(request()->post('kegiatan_keluar'));
        $data->kegiatan                 = strip_tags(request()->post('kegiatan'));
        if (request()->hasFile('photo')) {
            if ($data->photo <> 'default.jpg') {
                $fileName = public_path() . '/img/organisasi/' . $data->photo;
                File::delete($fileName);
            }

            $image = request()->file('photo');
            $imageName = request()->post('nama') . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/organisasi');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(300, 480)->save($imagePath . '/' . $imageName);


            $data->photo = $imageName;
        }
        $data->save();

        return redirect()->route('admin.organisasi.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TIKOrganisasi::findOrFail($id);

        if ($item->photo <> 'default.jpg') {
            $fileName2 = public_path() . '/img/organisasi/' . $item->photo;
            File::delete($fileName2);
        }

        $itemDelete = $item->delete();

        return response()->json($itemDelete);
    }

    public function download()
    {
        return view('admin.organisasi.download');
    }
}
