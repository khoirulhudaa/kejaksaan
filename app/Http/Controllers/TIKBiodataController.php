<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Kecamatan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusPerkawinan;
use App\Models\SukuBangsa;
use App\Models\TIKBiodata;
use App\Models\WargaNegara;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;

class TIKBiodataController extends Controller
{
    protected $customMessages = [
        'required'              => ':Attribute harus diisi',
        'unique'                => ':Attribute sudah ada.',
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
            return datatables()->of(TIKBiodata::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.biodata.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.biodata.index');
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

        return view('admin.biodata.create', compact('bangsa', 'kewarganegaraans', 'kecamatan', 'agama', 'pendidikan', 'pekerjaan', 'perkawinan'));
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
            'nik'                   => 'required|integer|unique:t_i_k_biodatas,nik',
            'nama'                  => 'required|string',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'jenis_kelamin'         => 'required|string',
            'kewarganegaraan'       => 'required|integer',
            'bangsa'                => 'required|integer',
        ], $this->customMessages);

        if (request()->post('kecamatan') == 'Lainnya') {
            $kecamatan = request()->post('kecamatan_');
        } else {
            $kecamatan = request()->post('kecamatan');
        }

        $data = new TIKBiodata();
        $data->nomor                    = strip_tags(request()->post('nomor'));
        $data->nik                      = strip_tags(request()->post('nik'));
        $data->nama                     = strip_tags(request()->post('nama'));
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
        $data->legitimasi_perkawinan    = strip_tags(request()->post('legitimasi_perkawinan'));
        $data->tempat_perkawinan        = strip_tags(request()->post('tempat_perkawinan'));
        $data->tanggal_perkawinan       = request()->post('tanggal_perkawinan');
        $data->riwayat_pekerjaan        = strip_tags(request()->post('riwayat_pekerjaan'));
        $data->riwayat_pendidikan       = strip_tags(request()->post('riwayat_pendidikan'));
        $data->riwayat_kepartaian       = strip_tags(request()->post('riwayat_kepartaian'));
        $data->riwayat_ormas            = strip_tags(request()->post('riwayat_ormas'));
        $data->nama_istri               = strip_tags(request()->post('nama_istri'));
        $data->nama_anak                = strip_tags(request()->post('nama_anak'));
        $data->nama_saudara             = strip_tags(request()->post('nama_saudara'));
        $data->nama_ayah_kandung        = strip_tags(request()->post('nama_ayah_kandung'));
        $data->alamat_ayah_kandung      = strip_tags(request()->post('alamat_ayah_kandung'));
        $data->nama_ibu_kandung         = strip_tags(request()->post('nama_ibu_kandung'));
        $data->alamat_ibu_kandung       = strip_tags(request()->post('alamat_ibu_kandung'));
        $data->nama_ayah_mertua         = strip_tags(request()->post('nama_ayah_mertua'));
        $data->alamat_ayah_mertua       = strip_tags(request()->post('alamat_ayah_mertua'));
        $data->nama_ibu_mertua          = strip_tags(request()->post('nama_ibu_mertua'));
        $data->alamat_ibu_mertua        = strip_tags(request()->post('alamat_ibu_mertua'));
        $data->nama_kenalan_pertama     = strip_tags(request()->post('nama_kenalan_pertama'));
        $data->alamat_kenalan_pertama   = strip_tags(request()->post('alamat_kenalan_pertama'));
        $data->nama_kenalan_kedua       = strip_tags(request()->post('nama_kenalan_kedua'));
        $data->alamat_kenalan_kedua     = strip_tags(request()->post('alamat_kenalan_kedua'));
        $data->nama_kenalan_ketiga      = strip_tags(request()->post('nama_kenalan_ketiga'));
        $data->alamat_kenalan_ketiga    = strip_tags(request()->post('alamat_kenalan_ketiga'));
        $data->hobi                     = strip_tags(request()->post('hobi'));
        $data->kedudukan                = strip_tags(request()->post('kedudukan'));
        $data->lain                     = strip_tags(request()->post('lain'));

        if (request()->hasFile('photo')) {
            $image = request()->file('photo');
            $imageName = request()->post('nama') . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/biodata');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(300, 480)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        } else {
            $data->photo = 'default.jpg';
        }
        $data->save();

        return redirect()->route('admin.biodata.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data = TIKBiodata::findOrFail($id);
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

        return view('admin.biodata.show', compact('age', 'data', 'bangsa', 'kewarganegaraans', 'kecamatan', 'agama', 'pendidikan', 'pekerjaan', 'perkawinan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TIKBiodata::findOrFail($id);
        $bangsas = SukuBangsa::orderBy('name')->get();
        $kewarganegaraans = WargaNegara::orderBy('name')->get();
        $kecamatans = Kecamatan::orderBy('name')->get();
        $agamas = Agama::orderBy('name')->get();
        $pendidikans = Pendidikan::orderBy('name')->get();
        $pekerjaans = Pekerjaan::orderBy('name')->get();
        $perkawinans = StatusPerkawinan::orderBy('name')->get();

        return view('admin.biodata.edit', compact('data', 'kewarganegaraans', 'bangsas', 'kecamatans', 'agamas', 'pendidikans', 'pekerjaans', 'perkawinans'));
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
        $data = TIKBiodata::findOrFail($id);
        request()->validate([
            'nomor'                 => 'required|string',
            'nik'                   => 'required|integer',
            'nama'                  => 'required|string',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'jenis_kelamin'         => 'required|string',
            'bangsa'                => 'required|integer',
            'kewarganegaraan'       => 'required|integer',
            'kecamatan'             => 'string',
            'alamat'                => 'required|string',
            'phone'                 => 'required|string',
            'pasport'               => 'required|string',
            'agama'                 => 'required|integer',
            'pendidikan'            => 'required|integer',
            'pekerjaan'             => 'required|integer',
            'alamat_kantor'         => 'required|string',
            'perkawinan'            => 'required|integer',
            'legitimasi_perkawinan' => 'string',
            'tempat_perkawinan'     => 'string',
            'tanggal_perkawinan'    => 'date',
            'riwayat_pekerjaan'     => 'string',
            'riwayat_pendidikan'    => 'string',
            'riwayat_kepartaian'    => 'string',
            'riwayat_ormas'         => 'string',
            'nama_istri'            => 'string',
            'nama_anak'             => 'string',
            'nama_saudara'          => 'string',
            'nama_ayah_kandung'     => 'string',
            'alamat_ayah_kandung'   => 'string',
            'nama_ibu_kandung'      => 'string',
            'alamat_ibu_kandung'    => 'string',
            'nama_ayah_mertua'      => 'string',
            'alamat_ayah_mertua'    => 'string',
            'nama_ibu_mertua'       => 'string',
            'alamat_ibu_mertua'     => 'string',
            'nama_kenalan_pertama'  => 'string',
            'alamat_kenalan_pertama' => 'string',
            'nama_kenalan_kedua'    => 'string',
            'alamat_kenalan_kedua'  => 'string',
            'nama_kenalan_ketiga'   => 'string',
            'alamat_kenalan_ketiga' => 'string',
            'hobi'                  => 'string',
            'kedudukan'             => 'string',
            'lain'                  => 'string',
        ], $this->customMessages);

        if (request()->post('kecamatan') == 'Lainnya') {
            $kecamatan = request()->post('kecamatan_');
        } else {
            $kecamatan = request()->post('kecamatan');
        }

        $data->nomor                    = strip_tags(request()->post('nomor'));
        $data->nik                      = strip_tags(request()->post('nik'));
        $data->nama                     = strip_tags(request()->post('nama'));
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
        $data->legitimasi_perkawinan    = strip_tags(request()->post('legitimasi_perkawinan'));
        $data->tempat_perkawinan        = strip_tags(request()->post('tempat_perkawinan'));
        $data->tanggal_perkawinan       = request()->post('tanggal_perkawinan');
        $data->riwayat_pekerjaan        = strip_tags(request()->post('riwayat_pekerjaan'));
        $data->riwayat_pendidikan       = strip_tags(request()->post('riwayat_pendidikan'));
        $data->riwayat_kepartaian       = strip_tags(request()->post('riwayat_kepartaian'));
        $data->riwayat_ormas            = strip_tags(request()->post('riwayat_ormas'));
        $data->nama_istri               = strip_tags(request()->post('nama_istri'));
        $data->nama_anak                = strip_tags(request()->post('nama_anak'));
        $data->nama_saudara             = strip_tags(request()->post('nama_saudara'));
        $data->nama_ayah_kandung        = strip_tags(request()->post('nama_ayah_kandung'));
        $data->alamat_ayah_kandung      = strip_tags(request()->post('alamat_ayah_kandung'));
        $data->nama_ibu_kandung         = strip_tags(request()->post('nama_ibu_kandung'));
        $data->alamat_ibu_kandung       = strip_tags(request()->post('alamat_ibu_kandung'));
        $data->nama_ayah_mertua         = strip_tags(request()->post('nama_ayah_mertua'));
        $data->alamat_ayah_mertua       = strip_tags(request()->post('alamat_ayah_mertua'));
        $data->nama_ibu_mertua          = strip_tags(request()->post('nama_ibu_mertua'));
        $data->alamat_ibu_mertua        = strip_tags(request()->post('alamat_ibu_mertua'));
        $data->nama_kenalan_pertama     = strip_tags(request()->post('nama_kenalan_pertama'));
        $data->alamat_kenalan_pertama   = strip_tags(request()->post('alamat_kenalan_pertama'));
        $data->nama_kenalan_kedua       = strip_tags(request()->post('nama_kenalan_kedua'));
        $data->alamat_kenalan_kedua     = strip_tags(request()->post('alamat_kenalan_kedua'));
        $data->nama_kenalan_ketiga      = strip_tags(request()->post('nama_kenalan_ketiga'));
        $data->alamat_kenalan_ketiga    = strip_tags(request()->post('alamat_kenalan_ketiga'));
        $data->hobi                     = strip_tags(request()->post('hobi'));
        $data->kedudukan                = strip_tags(request()->post('kedudukan'));
        $data->lain                     = strip_tags(request()->post('lain'));

        if (request()->hasFile('photo')) {
            if ($data->photo <> 'default.jpg') {
                $fileName = public_path() . '/img/biodata/' . $data->photo;
                File::delete($fileName);
            }

            $image = request()->file('photo');
            $imageName = request()->post('nama') . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/biodata');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(300, 480)->save($imagePath . '/' . $imageName);


            $data->photo = $imageName;
        }
        $data->save();

        return redirect()->route('admin.biodata.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $item = TIKBiodata::findOrFail($id);

        if ($item->photo <> 'default.jpg') {
            $fileName2 = public_path() . '/img/biodata/' . $item->photo;
            File::delete($fileName2);
        }

        $itemDelete = $item->delete();

        return response()->json($itemDelete);
    }

    public function download()
    {
        return view('admin.biodata.download');
    }
}
