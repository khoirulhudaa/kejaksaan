<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Pengobatan;
use Illuminate\Http\Request;

class PengobatanController extends Controller
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
            return datatables()->of(Pengobatan::orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('action', 'admin.pengobatan.action')
                ->rawColumns(['biodata', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pengobatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan            = Kecamatan::orderBy('name')->get();

        return view('admin.pengobatan.create', compact('kecamatan'));
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
            'nama_klinik'           => 'nullable|string',
            'alamat'                => 'nullable|string',
            'identitas'             => 'nullable|string',
            'jumlah_pembantu'       => 'nullable|string',
            'sumber_informasi'      => 'nullable|string',
            'asal_mula'             => 'nullable|string',
            'cara'                  => 'nullable|string',
            'nomor_ijin'            => 'nullable|string',
            'tgl_ijin'              => 'nullable|date',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data = new Pengobatan();
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan_id'));
        $data->tgl                      = request()->post('tgl');
        $data->nama_klinik              = strip_tags(request()->post('nama_klinik'));
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->identitas                = strip_tags(request()->post('identitas'));
        $data->jumlah_pembantu          = strip_tags(request()->post('jumlah_pembantu'));
        $data->sumber_informasi         = strip_tags(request()->post('sumber_informasi'));
        $data->asal_mula                = strip_tags(request()->post('asal_mula'));
        $data->cara                     = strip_tags(request()->post('cara'));
        $data->nomor_ijin               = strip_tags(request()->post('nomor_ijin'));
        $data->tgl_ijin                 = request()->post('tgl_ijin');
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengobatan.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data               = Pengobatan::findOrFail($id);

        return view('admin.pengobatan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data               = Pengobatan::findOrFail($id);
        $kecamatans         = Kecamatan::orderBY('name')->get();

        return view('admin.pengobatan.edit', compact('data', 'kecamatans'));
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
        $data = Pengobatan::findOrFail($id);
        request()->validate([
            'kecamatan_id'          => 'required|integer',
            'tgl'                   => 'required|date',
            'nama_klinik'           => 'nullable|string',
            'alamat'                => 'nullable|string',
            'identitas'             => 'nullable|string',
            'jumlah_pembantu'       => 'nullable|string',
            'sumber_informasi'      => 'nullable|string',
            'asal_mula'             => 'nullable|string',
            'cara'                  => 'nullable|string',
            'nomor_ijin'            => 'nullable|string',
            'tgl_ijin'              => 'nullable|date',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data->kecamatan_id             = strip_tags(request()->post('kecamatan_id'));
        $data->tgl                      = request()->post('tgl');
        $data->nama_klinik              = strip_tags(request()->post('nama_klinik'));
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->identitas                = strip_tags(request()->post('identitas'));
        $data->jumlah_pembantu          = strip_tags(request()->post('jumlah_pembantu'));
        $data->sumber_informasi         = strip_tags(request()->post('sumber_informasi'));
        $data->asal_mula                = strip_tags(request()->post('asal_mula'));
        $data->cara                     = strip_tags(request()->post('cara'));
        $data->nomor_ijin               = strip_tags(request()->post('nomor_ijin'));
        $data->tgl_ijin                 = request()->post('tgl_ijin');
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengobatan.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pengobatan::destroy($id);

        return response()->json($data);
    }

    public function filter()
    {
        return view('admin.pengobatan.filter');
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
        $data = Pengobatan::orderBy('updated_at', 'DESC')->whereYear('tgl', '=', $year)
            ->whereMonth('tgl', '=', $bulan)
            ->get();

        return view('admin.pengobatan.show', compact('data', 'month', 'year', 'atas_nama', 'jabatan', 'nama', 'nip', 'today'));
    }
}
