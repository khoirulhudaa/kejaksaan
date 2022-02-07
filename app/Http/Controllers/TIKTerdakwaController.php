<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Kecamatan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusPerkawinan;
use App\Models\SukuBangsa;
use App\Models\TIKTerdakwa;
use App\Models\WargaNegara;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class TIKTerdakwaController extends Controller
{
    protected $customMessages = [
        'required'              => ':attribute harus diisi',
        'unique'                => 'This :attribute has already been taken.',
        'integer'               => ':Attribute must be a number.',
        'min'                   => ':Attribute must be at least :min.',
        'max'                   => ':Attribute may not be more than :max characters.',
        'exists'                => 'Not found.',
        'bangsa.required'       => 'Pilih Suku Bangsa.',
        'kecamatan.required'    => 'Pilih Kecamatan.',
        'agama.required'        => 'Pilih Agama.',
        'pendidikan.required'   => 'Pilih Pendidikan.',
        'pekerjaan.required'    => 'Pilih Pekerjaan.',
        'perkawinan.required'   => 'Pilih Status Perkawinan.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(TIKTerdakwa::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.terdakwa.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.terdakwa.index');
    }

    public function create()
    {
        $bangsa = SukuBangsa::orderBy('name')->get();
        $kewarganegaraans = WargaNegara::orderBy('name')->get();
        $kecamatan = Kecamatan::orderBy('name')->get();
        $agama = Agama::orderBy('name')->get();
        $pendidikan = Pendidikan::orderBy('name')->get();
        $pekerjaan = Pekerjaan::orderBy('name')->get();
        $perkawinan = StatusPerkawinan::orderBy('name')->get();

        return view('admin.terdakwa.create', compact('bangsa', 'kewarganegaraans', 'kecamatan', 'agama', 'pendidikan', 'pekerjaan', 'perkawinan'));
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
            'panggilan'             => 'required|string',
            'tempat_lahir'          => 'nullable|string',
            'tanggal_lahir'         => 'nullable|date',
            'jenis_kelamin'         => 'nullable|string',
            'bangsa'                => 'required|integer',
            'kewarganegaraan'       => 'required|integer',
            'kecamatan'             => 'nullable|string',
            'alamat'                => 'nullable|string',
            'phone'                 => 'nullable|string',
            'pasport'               => 'nullable|string',
            'agama'                 => 'required|integer',
            'pendidikan'            => 'nullable|integer',
            'pekerjaan'             => 'nullable|integer',
            'alamat_kantor'         => 'nullable|string',
            'perkawinan'            => 'nullable|integer',
            'kepartaian'            => 'nullable|string',
            'kasus'                 => 'nullable|string',
            'background'            => 'nullable|string',
            'no_skpp'               => 'nullable|string',
            'tgl_skpp'              => 'nullable|date',
            'putusan_pengadilan_pn' => 'nullable|string',
            'putusan_pengadilan_pt' => 'nullable|string',
            'putusan_pengadilan_ma' => 'nullable|string',
            'nama_orangtua'         => 'nullable|string',
            'nama_kawan'            => 'nullable|string',
            'lain'                  => 'nullable|string',
        ], $this->customMessages);

        if (request()->post('kecamatan') == 'Lainnya') {
            $kecamatan = request()->post('kecamatan_');
        } else {
            $kecamatan = request()->post('kecamatan');
        }

        $data = new TIKTerdakwa();
        $data->nomor                    = strip_tags(request()->post('nomor'));
        $data->nama                     = strip_tags(request()->post('nama'));
        $data->panggilan                = strip_tags(request()->post('panggilan'));
        $data->tempat_lahir             = strip_tags(request()->post('tempat_lahir'));
        $data->tanggal_lahir            = request()->post('tanggal_lahir');
        $data->jenis_kelamin            = request()->post('jenis_kelamin');
        $data->bangsa_id                = strip_tags(request()->post('bangsa'));
        $data->kewarganegaraan_id       = strip_tags(request()->post('kewarganegaraan'));
        $data->kecamatan                = $kecamatan;
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->pasport                  = strip_tags(request()->post('pasport'));
        $data->agama_id                 = strip_tags(request()->post('agama'));
        $data->pendidikan_id            = strip_tags(request()->post('pendidikan'));
        $data->pekerjaan_id             = strip_tags(request()->post('pekerjaan'));
        $data->alamat_kantor            = strip_tags(request()->post('alamat_kantor'));
        $data->perkawinan_id            = strip_tags(request()->post('perkawinan'));
        $data->kepartaian               = strip_tags(request()->post('kepartaian'));
        $data->kasus                    = strip_tags(request()->post('kasus'));
        $data->background               = request()->post('background');
        $data->no_skpp                  = strip_tags(request()->post('no_skpp'));
        $data->tgl_skpp                 = strip_tags(request()->post('tgl_skpp'));
        $data->putusan_pengadilan_pn    = strip_tags(request()->post('putusan_pengadilan_pn'));
        $data->putusan_pengadilan_pt    = strip_tags(request()->post('putusan_pengadilan_pt'));
        $data->putusan_pengadilan_ma    = strip_tags(request()->post('putusan_pengadilan_ma'));
        $data->nama_orangtua            = strip_tags(request()->post('nama_orangtua'));
        $data->nama_kawan               = strip_tags(request()->post('nama_kawan'));
        $data->lain                     = strip_tags(request()->post('lain'));
        if (request()->hasFile('photo')) {
            $image = request()->file('photo');
            $imageName = request()->post('nama') . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/terdakwa');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(300, 480)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        } else {
            $data->photo = 'default.jpg';
        }
        $data->save();

        return redirect()->route('admin.terdakwa.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data = TIKTerdakwa::findOrFail($id);
        $bangsa = SukuBangsa::orderBy('name')->get();
        $kewarganegaraans = WargaNegara::orderBy('name')->get();
        $kecamatan = Kecamatan::orderBy('name')->get();
        $agama = Agama::orderBy('name')->get();
        $pendidikan = Pendidikan::orderBy('name')->get();
        $pekerjaan = Pekerjaan::orderBy('name')->get();
        $perkawinan = StatusPerkawinan::orderBy('name')->get();

        $now = \Carbon\Carbon::now();
        $b_day = \Carbon\Carbon::parse($data->tanggal_lahir);
        $age = $b_day->diffInYears($now);

        return view('admin.terdakwa.show', compact('age', 'data', 'bangsa', 'kewarganegaraans', 'kecamatan', 'agama', 'pendidikan', 'pekerjaan', 'perkawinan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TIKTerdakwa::findOrFail($id);
        $bangsas = SukuBangsa::orderBy('name')->get();
        $kewarganegaraans = WargaNegara::orderBy('name')->get();
        $kecamatans = Kecamatan::orderBy('name')->get();
        $agamas = Agama::orderBy('name')->get();
        $pendidikans = Pendidikan::orderBy('name')->get();
        $pekerjaans = Pekerjaan::orderBy('name')->get();
        $perkawinans = StatusPerkawinan::orderBy('name')->get();

        return view('admin.terdakwa.edit', compact('data', 'kewarganegaraans', 'bangsas', 'kecamatans', 'agamas', 'pendidikans', 'pekerjaans', 'perkawinans'));
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
        $data = TIKTerdakwa::findOrFail($id);
        request()->validate([
            'nomor'                 => 'required|string',
            'nama'                  => 'required|string',
            'panggilan'             => 'required|string',
            'tempat_lahir'          => 'nullable|string',
            'tanggal_lahir'         => 'nullable|date',
            'jenis_kelamin'         => 'nullable|string',
            'bangsa'                => 'required|integer',
            'kewarganegaraan'       => 'required|integer',
            'kecamatan'             => 'nullable|string',
            'alamat'                => 'nullable|string',
            'phone'                 => 'nullable|string',
            'pasport'               => 'nullable|string',
            'agama'                 => 'required|integer',
            'pendidikan'            => 'nullable|integer',
            'pekerjaan'             => 'nullable|integer',
            'alamat_kantor'         => 'nullable|string',
            'perkawinan'            => 'nullable|integer',
            'kepartaian'            => 'nullable|string',
            'kasus'                 => 'nullable|string',
            'background'            => 'nullable|string',
            'no_skpp'               => 'nullable|string',
            'tgl_skpp'              => 'nullable|date',
            'putusan_pengadilan_pn' => 'nullable|string',
            'putusan_pengadilan_pt' => 'nullable|string',
            'putusan_pengadilan_ma' => 'nullable|string',
            'nama_orangtua'         => 'nullable|string',
            'nama_kawan'            => 'nullable|string',
            'lain'                  => 'nullable|string',
        ], $this->customMessages);

        if (request()->post('kecamatan') == 'Lainnya') {
            $kecamatan = request()->post('kecamatan_');
        } else {
            $kecamatan = request()->post('kecamatan');
        }

        $data->nomor                    = strip_tags(request()->post('nomor'));
        $data->nama                     = strip_tags(request()->post('nama'));
        $data->panggilan                = strip_tags(request()->post('panggilan'));
        $data->tempat_lahir             = strip_tags(request()->post('tempat_lahir'));
        $data->tanggal_lahir            = request()->post('tanggal_lahir');
        $data->jenis_kelamin            = request()->post('jenis_kelamin');
        $data->bangsa_id                = strip_tags(request()->post('bangsa'));
        $data->kewarganegaraan_id       = strip_tags(request()->post('kewarganegaraan'));
        $data->kecamatan                = $kecamatan;
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->pasport                  = strip_tags(request()->post('pasport'));
        $data->agama_id                 = strip_tags(request()->post('agama'));
        $data->pendidikan_id            = strip_tags(request()->post('pendidikan'));
        $data->pekerjaan_id             = strip_tags(request()->post('pekerjaan'));
        $data->alamat_kantor            = strip_tags(request()->post('alamat_kantor'));
        $data->perkawinan_id            = strip_tags(request()->post('perkawinan'));
        $data->kepartaian               = strip_tags(request()->post('kepartaian'));
        $data->kasus                    = strip_tags(request()->post('kasus'));
        $data->background               = request()->post('background');
        $data->no_skpp                  = strip_tags(request()->post('no_skpp'));
        $data->tgl_skpp                 = strip_tags(request()->post('tgl_skpp'));
        $data->putusan_pengadilan_pn    = strip_tags(request()->post('putusan_pengadilan_pn'));
        $data->putusan_pengadilan_pt    = strip_tags(request()->post('putusan_pengadilan_pt'));
        $data->putusan_pengadilan_ma    = strip_tags(request()->post('putusan_pengadilan_ma'));
        $data->nama_orangtua            = strip_tags(request()->post('nama_orangtua'));
        $data->nama_kawan               = strip_tags(request()->post('nama_kawan'));
        $data->lain                     = strip_tags(request()->post('lain'));
        if (request()->hasFile('photo')) {
            if ($data->photo <> 'default.jpg') {
                $fileName = public_path() . '/img/terdakwa/' . $data->photo;
                File::delete($fileName);
            }

            $image = request()->file('photo');
            $imageName = request()->post('nama') . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/terdakwa');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(300, 480)->save($imagePath . '/' . $imageName);


            $data->photo = $imageName;
        }
        $data->save();

        return redirect()->route('admin.terdakwa.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TIKTerdakwa::findOrFail($id);

        if ($item->photo <> 'default.jpg') {
            $fileName2 = public_path() . '/img/terdakwa/' . $item->photo;
            File::delete($fileName2);
        }

        $itemDelete = $item->delete();

        return response()->json($itemDelete);
    }

    public function download()
    {
        return view('admin.terdakwa.download');
    }
}
