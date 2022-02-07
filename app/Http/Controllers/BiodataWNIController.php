<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\BiodataWNI;
use App\Models\Kecamatan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusPerkawinan;
use App\Models\LegalitasPerkawinan;
use App\Models\SukuBangsa;
use Illuminate\Http\Request;

class BiodataWNIController extends Controller
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
            return datatables()->of(BiodataWNI::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.wni.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.wni.index');
    }

    public function create()
    {
        $bangsa = SukuBangsa::orderBy('name')->get();
        $kecamatan = Kecamatan::orderBy('name')->get();
        $agama = Agama::orderBy('name')->get();
        $pendidikan = Pendidikan::orderBy('name')->get();
        $pekerjaan = Pekerjaan::orderBy('name')->get();
        $legalitas = LegalitasPerkawinan::orderBy('name')->get();
        $perkawinan = StatusPerkawinan::orderBy('name')->get();

        return view('admin.wni.create', compact('bangsa', 'kecamatan', 'agama', 'pendidikan', 'pekerjaan', 'perkawinan', 'legalitas'));
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
            'nik'                   => 'required|integer|unique:biodata_w_n_i_s,nik',
            'nama'                  => 'required|string',
            'tempat_lahir'          => 'nullable|string',
            'tanggal_lahir'         => 'nullable|date',
            'jenis_kelamin'         => 'nullable|string',
            'bangsa'                => 'nullable|integer',
            'kecamatan'             => 'required|string',
            'alamat'                => 'nullable|string',
            'phone'                 => 'nullable|string',
            'agama'                 => 'nullable|integer',
            'pendidikan'            => 'nullable|integer',
            'pekerjaan'             => 'nullable|integer',
            'alamat_kantor'         => 'nullable|string',
            'perkawinan'            => 'nullable|integer',
            'legitimasi_perkawinan' => 'nullable|integer',
            'tempat_perkawinan'     => 'nullable|string',
            'tanggal_perkawinan'    => 'nullable|date',
        ], $this->customMessages);

        if (request()->post('kecamatan') == 'Lainnya') {
            $kecamatan = request()->post('kecamatan_');
        } else {
            $kecamatan = request()->post('kecamatan');
        }

        $data = new BiodataWNI();
        $data->nik                      = strip_tags(request()->post('nik'));
        $data->name                     = strip_tags(request()->post('nama'));
        $data->tempat_lahir             = strip_tags(request()->post('tempat_lahir'));
        $data->tanggal_lahir            = request()->post('tanggal_lahir');
        $data->jenis_kelamin            = request()->post('jenis_kelamin');
        $data->bangsa_id                = strip_tags(request()->post('bangsa'));
        $data->kecamatan                = $kecamatan;
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->agama_id                 = strip_tags(request()->post('agama'));
        $data->pendidikan_id            = strip_tags(request()->post('pendidikan'));
        $data->pekerjaan_id             = strip_tags(request()->post('pekerjaan'));
        $data->alamat_kantor            = strip_tags(request()->post('alamat_kantor'));
        $data->perkawinan_id            = strip_tags(request()->post('perkawinan'));
        $data->legitimasi_perkawinan    = strip_tags(request()->post('legitimasi_perkawinan'));
        $data->tempat_perkawinan        = strip_tags(request()->post('tempat_perkawinan'));
        $data->tanggal_perkawinan       = request()->post('tanggal_perkawinan');
        $data->save();

        return redirect()->route('admin.wni.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BiodataWNI::findOrFail($id);
        $bangsa = SukuBangsa::orderBy('name')->get();
        $kecamatan = Kecamatan::orderBy('name')->get();
        $agama = Agama::orderBy('name')->get();
        $pendidikan = Pendidikan::orderBy('name')->get();
        $pekerjaan = Pekerjaan::orderBy('name')->get();
        $perkawinan = StatusPerkawinan::orderBy('name')->get();

        return view('admin.wni.show', compact('data', 'bangsa', 'kecamatan', 'agama', 'pendidikan', 'pekerjaan', 'perkawinan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BiodataWNI::findOrFail($id);
        $bangsas = SukuBangsa::orderBy('name')->get();
        $kecamatans = Kecamatan::orderBy('name')->get();
        $agamas = Agama::orderBy('name')->get();
        $pendidikans = Pendidikan::orderBy('name')->get();
        $pekerjaans = Pekerjaan::orderBy('name')->get();
        $legalitas = LegalitasPerkawinan::orderBy('name')->get();
        $perkawinans = StatusPerkawinan::orderBy('name')->get();

        return view('admin.wni.edit', compact('data', 'bangsas', 'kecamatans', 'agamas', 'pendidikans', 'pekerjaans', 'perkawinans', 'legalitas'));
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
        $data = BiodataWNI::findOrFail($id);
        request()->validate([
            'nik'                   => 'required|integer',
            'nama'                  => 'required|string',
            'tempat_lahir'          => 'nullable|string',
            'tanggal_lahir'         => 'nullable|date',
            'jenis_kelamin'         => 'nullable|string',
            'bangsa'                => 'nullable|integer',
            'kecamatan'             => 'required|string',
            'alamat'                => 'nullable|string',
            'phone'                 => 'nullable|string',
            'agama'                 => 'nullable|integer',
            'pendidikan'            => 'nullable|integer',
            'pekerjaan'             => 'nullable|integer',
            'alamat_kantor'         => 'nullable|string',
            'perkawinan'            => 'nullable|integer',
            'legitimasi_perkawinan' => 'nullable|integer',
            'tempat_perkawinan'     => 'nullable|string',
            'tanggal_perkawinan'    => 'nullable|date',
        ], $this->customMessages);

        if (request()->post('kecamatan') == 'Lainnya') {
            $kecamatan = request()->post('kecamatan_');
        } else {
            $kecamatan = request()->post('kecamatan');
        }

        $data->nik                      = strip_tags(request()->post('nik'));
        $data->name                     = strip_tags(request()->post('nama'));
        $data->tempat_lahir             = strip_tags(request()->post('tempat_lahir'));
        $data->tanggal_lahir            = request()->post('tanggal_lahir');
        $data->jenis_kelamin            = request()->post('jenis_kelamin');
        $data->bangsa_id                = strip_tags(request()->post('bangsa'));
        $data->kecamatan                = $kecamatan;
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->phone                    = strip_tags(request()->post('phone'));
        $data->agama_id                 = strip_tags(request()->post('agama'));
        $data->pendidikan_id            = strip_tags(request()->post('pendidikan'));
        $data->pekerjaan_id             = strip_tags(request()->post('pekerjaan'));
        $data->alamat_kantor            = strip_tags(request()->post('alamat_kantor'));
        $data->perkawinan_id            = strip_tags(request()->post('perkawinan'));
        $data->legitimasi_perkawinan    = strip_tags(request()->post('legitimasi_perkawinan'));
        $data->tempat_perkawinan        = strip_tags(request()->post('tempat_perkawinan'));
        $data->tanggal_perkawinan       = request()->post('tanggal_perkawinan');
        $data->save();

        return redirect()->route('admin.wni.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BiodataWNI::destroy($id);

        return response()->json($data);
    }

    public function search()
    {
        $id = $_GET['id'];
        $data = BiodataWNI::where('id', $id)->get();

        return $data;
    }
}
