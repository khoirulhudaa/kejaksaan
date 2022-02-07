<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\PengawasanBarang;
use App\Models\TIKBarang;
use Illuminate\Http\Request;

class PengawasanBarangController extends Controller
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
            return datatables()->of(PengawasanBarang::with('barang')
                ->orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('barang', 'admin.pengawasan-barang.barang')
                ->addColumn('action', 'admin.pengawasan-barang.action')
                ->rawColumns(['barang', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pengawasan-barang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan              = Kecamatan::orderBy('name')->get();
        $barang                 = TIKBarang::orderBy('nama')->get();

        return view('admin.pengawasan-barang.create', compact('kecamatan', 'barang'));
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
            'kecamatan_id'          => 'required|string',
            'tgl'                   => 'required|date',
            'barang'                => 'required|integer',
            'tgl_penerbitan'        => 'nullable|date',
            'penulis'               => 'nullable|string',
            'judul'                 => 'nullable|string',
            'hasil'                 => 'nullable|string',
            'tindak_lanjut'         => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data = new PengawasanBarang();
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan_id'));
        $data->tgl                      = request()->post('tgl');
        $data->barang_id                = strip_tags(request()->post('barang'));
        $data->tgl_penerbitan           = request()->post('tgl_penerbitan');
        $data->penulis                  = strip_tags(request()->post('penulis'));
        $data->judul                    = strip_tags(request()->post('judul'));
        $data->hasil                    = strip_tags(request()->post('hasil'));
        $data->tindak_lanjut            = strip_tags(request()->post('tindak_lanjut'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengawasan_barang.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data               = PengawasanBarang::findOrFail($id);

        return view('admin.pengawasan-barang.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data               = PengawasanBarang::findOrFail($id);
        $kecamatans         = Kecamatan::orderBY('name')->get();
        $barangs            = TIKBarang::orderBY('nama')->get();

        return view('admin.pengawasan-barang.edit', compact('data', 'kecamatans', 'barangs'));
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
        $data = PengawasanBarang::findOrFail($id);
        request()->validate([
            'kecamatan_id'          => 'required|string',
            'tgl'                   => 'required|date',
            'barang'                => 'required|integer',
            'tgl_penerbitan'        => 'nullable|date',
            'penulis'               => 'nullable|string',
            'judul'                 => 'nullable|string',
            'hasil'                 => 'nullable|string',
            'tindak_lanjut'         => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data->kecamatan_id             = strip_tags(request()->post('kecamatan_id'));
        $data->tgl                      = request()->post('tgl');
        $data->barang_id                = strip_tags(request()->post('barang'));
        $data->tgl_penerbitan           = request()->post('tgl_penerbitan');
        $data->penulis                  = strip_tags(request()->post('penulis'));
        $data->judul                    = strip_tags(request()->post('judul'));
        $data->hasil                    = strip_tags(request()->post('hasil'));
        $data->tindak_lanjut            = strip_tags(request()->post('tindak_lanjut'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengawasan_barang.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PengawasanBarang::destroy($id);

        return response()->json($data);
    }

    public function filter()
    {
        return view('admin.pengawasan-barang.filter');
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
        $data = PengawasanBarang::orderBy('updated_at', 'DESC')->whereYear('tgl', '=', $year)
            ->whereMonth('tgl', '=', $bulan)
            ->get();

        return view('admin.pengawasan-barang.show', compact('data', 'month', 'year', 'atas_nama', 'jabatan', 'nama', 'nip', 'today'));
    }
}
