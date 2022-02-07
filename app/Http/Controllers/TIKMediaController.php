<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\TIKMedia;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class TIKMediaController extends Controller
{
    protected $customMessages = [
        'required'              => ':attribute harus diisi',
        'unique'                => 'This :attribute has already been taken.',
        'integer'               => ':Attribute must be a number.',
        'min'                   => ':Attribute must be at least :min.',
        'max'                   => ':Attribute may not be more than :max characters.',
        'exists'                => 'Not found.',
        'kecamatan.required'    => 'Pilih Kecamatan.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(TIKMedia::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.media.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.media.index');
    }

    public function create()
    {
        $kecamatan = Kecamatan::orderBy('name')->get();

        return view('admin.media.create', compact('kecamatan'));
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
            'npwp'                  => 'required|string',
            'jenis'                 => 'required|string',
            'alamat'                => 'required|string',
            'phone'                 => 'required|string',
            'nama_pimpinan'         => 'required|string',
            'penanggung_jawab'      => 'required|string',
            'ijin_usaha'            => 'required|string',
            'waktu'                 => 'required|date',
            'daerah'                => 'required|string',
            'jumlah'                => 'required|string',
            'kecamatan'             => 'nullable|string',
            'kasus'                 => 'nullable|string',
            'background'            => 'nullable|string',
            'tindakan'              => 'nullable|string',
            'tindakan_kejaksaan'    => 'nullable|string',
            'tindakan_kepolisian'   => 'nullable|string',
            'tindakan_kominfo'      => 'nullable|string',
            'tindakan_pengadilan'   => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        if (request()->post('kecamatan') == 'Lainnya') {
            $kecamatan = request()->post('kecamatan_');
        } else {
            $kecamatan = request()->post('kecamatan');
        }

        $data = new TIKMedia();
        $data->nomor                    = strip_tags(request()->post('nomor'));
        $data->nama                     = strip_tags(request()->post('nama'));
        $data->npwp                     = strip_tags(request()->post('npwp'));
        $data->jenis                    = strip_tags(request()->post('jenis'));
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->nama_pimpinan            = strip_tags(request()->post('nama_pimpinan'));
        $data->penanggung_jawab         = strip_tags(request()->post('penanggung_jawab'));
        $data->ijin_usaha               = strip_tags(request()->post('ijin_usaha'));
        $data->waktu                    = request()->post('waktu');
        $data->daerah                   = strip_tags(request()->post('daerah'));
        $data->jumlah                   = strip_tags(request()->post('jumlah'));
        $data->kecamatan                = $kecamatan;
        $data->kasus                    = strip_tags(request()->post('kasus'));
        $data->background               = request()->post('background');
        $data->tindakan                 = strip_tags(request()->post('tindakan'));
        $data->tindakan_kejaksaan       = strip_tags(request()->post('tindakan_kejaksaan'));
        $data->tindakan_kepolisian      = strip_tags(request()->post('tindakan_kepolisian'));
        $data->tindakan_kominfo         = strip_tags(request()->post('tindakan_kominfo'));
        $data->tindakan_pengadilan      = strip_tags(request()->post('tindakan_pengadilan'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        if (request()->hasFile('photo')) {
            $image = request()->file('photo');
            $imageName = request()->post('nama') . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/media');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(300, 480)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        } else {
            $data->photo = 'default.jpg';
        }
        $data->save();

        return redirect()->route('admin.media.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TIKMedia::findOrFail($id);
        $kecamatan = Kecamatan::orderBy('name')->get();

        return view('admin.media.show', compact('data', 'kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TIKMedia::findOrFail($id);
        $kecamatans = Kecamatan::orderBy('name')->get();

        return view('admin.media.edit', compact('data', 'kecamatans'));
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
        $data = TIKMedia::findOrFail($id);
        request()->validate([
            'nomor'                 => 'required|string',
            'nama'                  => 'required|string',
            'npwp'                  => 'required|string',
            'jenis'                 => 'required|string',
            'alamat'                => 'required|string',
            'phone'                 => 'required|string',
            'nama_pimpinan'         => 'required|string',
            'penanggung_jawab'      => 'required|string',
            'ijin_usaha'            => 'required|string',
            'waktu'                 => 'required|date',
            'daerah'                => 'required|string',
            'jumlah'                => 'required|string',
            'kecamatan'             => 'string',
            'kasus'                 => 'string',
            'background'            => 'string',
            'tindakan'              => 'string',
            'tindakan_kejaksaan'    => 'string',
            'tindakan_kepolisian'   => 'string',
            'tindakan_kominfo'   => 'string',
            'tindakan_pengadilan'   => 'string',
            'keterangan'            => 'string',
        ], $this->customMessages);

        if (request()->post('kecamatan') == 'Lainnya') {
            $kecamatan = request()->post('kecamatan_');
        } else {
            $kecamatan = request()->post('kecamatan');
        }

        $data->nomor                    = strip_tags(request()->post('nomor'));
        $data->nama                     = strip_tags(request()->post('nama'));
        $data->npwp                     = strip_tags(request()->post('npwp'));
        $data->jenis                    = strip_tags(request()->post('jenis'));
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->nama_pimpinan            = strip_tags(request()->post('nama_pimpinan'));
        $data->penanggung_jawab         = strip_tags(request()->post('penanggung_jawab'));
        $data->ijin_usaha               = strip_tags(request()->post('ijin_usaha'));
        $data->waktu                    = request()->post('waktu');
        $data->daerah                   = strip_tags(request()->post('daerah'));
        $data->jumlah                   = strip_tags(request()->post('jumlah'));
        $data->kecamatan                = $kecamatan;
        $data->kasus                    = strip_tags(request()->post('kasus'));
        $data->background               = request()->post('background');
        $data->tindakan                 = strip_tags(request()->post('tindakan'));
        $data->tindakan_kejaksaan       = strip_tags(request()->post('tindakan_kejaksaan'));
        $data->tindakan_kepolisian      = strip_tags(request()->post('tindakan_kepolisian'));
        $data->tindakan_kominfo         = strip_tags(request()->post('tindakan_kominfo'));
        $data->tindakan_pengadilan      = strip_tags(request()->post('tindakan_pengadilan'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        if (request()->hasFile('photo')) {
            if ($data->photo <> 'default.jpg') {
                $fileName = public_path() . '/img/media/' . $data->photo;
                File::delete($fileName);
            }

            $image = request()->file('photo');
            $imageName = request()->post('nama') . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/media');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(300, 480)->save($imagePath . '/' . $imageName);


            $data->photo = $imageName;
        }
        $data->save();


        return redirect()->route('admin.media.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TIKMedia::findOrFail($id);

        if ($item->photo <> 'default.jpg') {
            $fileName2 = public_path() . '/img/media/' . $item->photo;
            File::delete($fileName2);
        }

        $itemDelete = $item->delete();

        return response()->json($itemDelete);
    }

    public function download()
    {
        return view('admin.media.download');
    }

    public function search()
    {
        $id = $_GET['id'];
        $data = TIKMedia::where('id', $id)->get();

        return $data;
    }
}
