<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\PengawasanOrganisasi;
use App\Models\TIKOrganisasi;
use Illuminate\Http\Request;

class PengawasanOrganisasiController extends Controller
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
            return datatables()->of(PengawasanOrganisasi::with('organisasi')->orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('organisasi', 'admin.pengawasan-organisasi.organisasi')
                ->addColumn('action', 'admin.pengawasan-organisasi.action')
                ->rawColumns(['organisasi', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pengawasan-organisasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan            = Kecamatan::orderBy('name')->get();
        $organisasi           = TIKOrganisasi::orderBy('nama')->get();

        return view('admin.pengawasan-organisasi.create', compact('kecamatan', 'organisasi'));
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
            'kecamatan_id'          => 'required|integer',
            'tgl'                   => 'required|date',
            'nama'                  => 'required|integer',
            'status'                => 'nullable|string',
            'akta'                  => 'nullable|date',
            'alamat'                => 'nullable|string',
            'pengurus'              => 'nullable|string',
            'kegiatan'              => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data = new PengawasanOrganisasi();
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan_id'));
        $data->tgl                      = request()->post('tgl');
        $data->organisasi_id            = strip_tags(request()->post('nama'));
        $data->status                   = strip_tags(request()->post('status'));
        $data->akta                     = request()->post('akta');
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->pengurus                 = strip_tags(request()->post('pengurus'));
        $data->kegiatan                 = strip_tags(request()->post('kegiatan'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengawasan_organisasi.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data               = PengawasanOrganisasi::findOrFail($id);

        return view('admin.pengawasan-organisasi.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data               = PengawasanOrganisasi::findOrFail($id);
        $kecamatans         = Kecamatan::orderBY('name')->get();
        $organisasis        = TIKOrganisasi::orderBY('nama')->get();

        return view('admin.pengawasan-organisasi.edit', compact('data', 'kecamatans', 'organisasis'));
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
        $data = PengawasanOrganisasi::findOrFail($id);
        request()->validate([
            'kecamatan_id'          => 'required|integer',
            'tgl'                   => 'required|date',
            'nama'                  => 'required|integer',
            'status'                => 'nullable|string',
            'akta'                  => 'nullable|date',
            'alamat'                => 'nullable|string',
            'pengurus'              => 'nullable|string',
            'kegiatan'              => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data->kecamatan_id             = strip_tags(request()->post('kecamatan_id'));
        $data->tgl                      = request()->post('tgl');
        $data->organisasi_id            = strip_tags(request()->post('nama'));
        $data->status                   = strip_tags(request()->post('status'));
        $data->akta                     = request()->post('akta');
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->pengurus                 = strip_tags(request()->post('pengurus'));
        $data->kegiatan                 = strip_tags(request()->post('kegiatan'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();


        return redirect()->route('admin.pengawasan_organisasi.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PengawasanOrganisasi::destroy($id);

        return response()->json($data);
    }

    public function filter()
    {
        return view('admin.pengawasan-organisasi.filter');
    }

    public function download(Request $request)
    {
        $month          = request()->post('bulan');
        $bulan = request()->post('bulan');
        if ($bulan == 'JANUARI') {
            $bulan = '01';
        } else if ($bulan == 'FEBRUARI') {
            $bulan = '02';
        } else if ($bulan == 'MARET') {
            $bulan = '03';
        } else if ($bulan == 'APRIL') {
            $bulan = '04';
        } else if ($bulan == 'MEI') {
            $bulan = '05';
        } else if ($bulan == 'JUNI') {
            $bulan = '06';
        } else if ($bulan == 'JULI') {
            $bulan = '07';
        } else if ($bulan == 'AGUSTUS') {
            $bulan = '08';
        } else if ($bulan == 'SEPTEMBER') {
            $bulan = '09';
        } else if ($bulan == 'OKTOBER') {
            $bulan = '10';
        } else if ($bulan == 'NOVEMBER') {
            $bulan = '11';
        } else if ($bulan == 'DESEMBER') {
            $bulan = '12';
        }
        $year           = request()->post('tahun');
        $atas_nama      = request()->post('atas_nama');
        $jabatan        = request()->post('jabatan');
        $nama           = request()->post('nama');
        $nip            = request()->post('nip');
        $date = \Carbon\Carbon::now()->locale('id');
        $today          = $date->day . ' ' . $date->monthName . ' ' . $date->year;
        $data = PengawasanOrganisasi::orderBy('updated_at', 'DESC')->whereYear('tgl', '=', $year)
            ->whereMonth('tgl', '=', $bulan)
            ->get();

        return view('admin.pengawasan-organisasi.show', compact('data', 'month', 'year', 'atas_nama', 'jabatan', 'nama', 'nip', 'today'));
    }
}
