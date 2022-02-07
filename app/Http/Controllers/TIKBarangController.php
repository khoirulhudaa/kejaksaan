<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\TIKBarang;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class TIKBarangController extends Controller
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
            return datatables()->of(TIKBarang::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.barang.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.barang.index');
    }

    public function create()
    {
        $kecamatan = Kecamatan::orderBy('name')->get();

        return view('admin.barang.create', compact('kecamatan'));
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
            'penerbit'              => 'required|string',
            'pengarang'             => 'required|string',
            'waktu'                 => 'required|date',
            'daerah'                => 'required|string',
            'pencetak'              => 'required|string',
            'nama_pimpinan'         => 'required|string',
            'alamat_penerbit'       => 'required|string',
            'alamat_percetakan'     => 'required|string',
            'jumlah_oplah'          => 'required|string',
            'kecamatan'             => 'nullable|string',
            'kasus'                 => 'nullable|string',
            'background'            => 'nullable|string',
            'tindakan'              => 'nullable|string',
            'tindakan_kejaksaan'    => 'nullable|string',
            'tindakan_kepolisian'   => 'nullable|string',
            'tindakan_pengadilan'   => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        if (request()->post('kecamatan') == 'Lainnya') {
            $kecamatan = request()->post('kecamatan_');
        } else {
            $kecamatan = request()->post('kecamatan');
        }

        $data = new TIKBarang();
        $data->nomor                    = strip_tags(request()->post('nomor'));
        $data->nama                     = strip_tags(request()->post('nama'));
        $data->penerbit                 = strip_tags(request()->post('penerbit'));
        $data->pengarang                = request()->post('pengarang');
        $data->waktu                    = request()->post('waktu');
        $data->daerah                   = strip_tags(request()->post('daerah'));
        $data->pencetak                 = strip_tags(request()->post('pencetak'));
        $data->nama_pimpinan            = strip_tags(request()->post('nama_pimpinan'));
        $data->alamat_penerbit          = strip_tags(request()->post('alamat_penerbit'));
        $data->alamat_percetakan        = strip_tags(request()->post('alamat_percetakan'));
        $data->jumlah_oplah             = strip_tags(request()->post('jumlah_oplah'));
        $data->kecamatan                = $kecamatan;
        $data->kasus                    = strip_tags(request()->post('kasus'));
        $data->background               = request()->post('background');
        $data->tindakan                 = strip_tags(request()->post('tindakan'));
        $data->tindakan_kejaksaan       = strip_tags(request()->post('tindakan_kejaksaan'));
        $data->tindakan_kepolisian      = strip_tags(request()->post('tindakan_kepolisian'));
        $data->tindakan_pengadilan      = strip_tags(request()->post('tindakan_pengadilan'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));

        if (request()->hasFile('photo')) {
            $image = request()->file('photo');
            $imageName = request()->post('nama') . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/barang');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(300, 480)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        } else {
            $data->photo = 'default.jpg';
        }
        $data->save();

        return redirect()->route('admin.barang.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TIKBarang::findOrFail($id);
        $kecamatan = Kecamatan::orderBy('name')->get();

        return view('admin.barang.show', compact('data', 'kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TIKBarang::findOrFail($id);
        $kecamatans = Kecamatan::orderBy('name')->get();

        return view('admin.barang.edit', compact('data', 'kecamatans'));
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
        $data = TIKBarang::findOrFail($id);
        request()->validate([
            'nama'                  => 'required|string',
            'penerbit'              => 'required|string',
            'pengarang'             => 'required|string',
            'waktu'                 => 'required|date',
            'daerah'                => 'required|string',
            'pencetak'              => 'required|string',
            'nama_pimpinan'         => 'required|string',
            'alamat_penerbit'       => 'required|string',
            'alamat_percetakan'     => 'required|string',
            'jumlah_oplah'          => 'required|string',
            'kecamatan'             => 'nullable|string',
            'kasus'                 => 'nullable|string',
            'background'            => 'nullable|string',
            'tindakan'              => 'nullable|string',
            'tindakan_kejaksaan'    => 'nullable|string',
            'tindakan_kepolisian'   => 'nullable|string',
            'tindakan_pengadilan'   => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        if (request()->post('kecamatan') == 'Lainnya') {
            $kecamatan = request()->post('kecamatan_');
        } else {
            $kecamatan = request()->post('kecamatan');
        }

        $data->nama                     = strip_tags(request()->post('nama'));
        $data->penerbit                 = strip_tags(request()->post('penerbit'));
        $data->pengarang                = request()->post('pengarang');
        $data->waktu                    = request()->post('waktu');
        $data->daerah                   = strip_tags(request()->post('daerah'));
        $data->pencetak                 = strip_tags(request()->post('pencetak'));
        $data->nama_pimpinan            = strip_tags(request()->post('nama_pimpinan'));
        $data->alamat_penerbit          = strip_tags(request()->post('alamat_penerbit'));
        $data->alamat_percetakan        = strip_tags(request()->post('alamat_percetakan'));
        $data->jumlah_oplah             = strip_tags(request()->post('jumlah_oplah'));
        $data->kecamatan                = $kecamatan;
        $data->kasus                    = strip_tags(request()->post('kasus'));
        $data->background               = request()->post('background');
        $data->tindakan                 = strip_tags(request()->post('tindakan'));
        $data->tindakan_kejaksaan       = strip_tags(request()->post('tindakan_kejaksaan'));
        $data->tindakan_kepolisian      = strip_tags(request()->post('tindakan_kepolisian'));
        $data->tindakan_pengadilan      = strip_tags(request()->post('tindakan_pengadilan'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));

        if (request()->hasFile('photo')) {
            if ($data->photo <> 'default.jpg') {
                $fileName = public_path() . '/img/barang/' . $data->photo;
                File::delete($fileName);
            }

            $image = request()->file('photo');
            $imageName = request()->post('nama') . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/barang');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(300, 480)->save($imagePath . '/' . $imageName);


            $data->photo = $imageName;
        }
        $data->save();

        return redirect()->route('admin.barang.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TIKBarang::findOrFail($id);

        if ($item->photo <> 'default.jpg') {
            $fileName2 = public_path() . '/img/barang/' . $item->photo;
            File::delete($fileName2);
        }

        $itemDelete = $item->delete();

        return response()->json($itemDelete);
    }

    public function download()
    {
        return view('admin.barang.download');
    }

    public function search()
    {
        $id = $_GET['id'];
        $data = TIKBarang::where('id', $id)->get();

        return $data;
    }
}
