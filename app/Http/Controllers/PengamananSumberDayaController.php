<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\PengamananSumberDaya;
use Illuminate\Http\Request;

class PengamananSumberDayaController extends Controller
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
            return datatables()->of(PengamananSumberDaya::orderBy('created_at', 'DESC')
                ->get())
                ->addColumn('action', 'admin.pengamanan.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pengamanan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan            = Kecamatan::orderBy('name')->get();

        return view('admin.pengamanan.create', compact('kecamatan'));
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
            'sumber_informasi'      => 'nullable|string',
            'isi_informasi'         => 'nullable|string',
            'tahapan_dik'           => 'nullable|string',
            'tahapan_pratut'        => 'nullable|string',
            'tahapan_tut'           => 'nullable|string',
            'tahapan_eksekusi'      => 'nullable|string',
            'lama_pidana'           => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data = new PengamananSumberDaya();
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan_id'));
        $data->tgl                      = request()->post('tgl');
        $data->sumber_informasi         = strip_tags(request()->post('sumber_informasi'));
        $data->isi_informasi            = strip_tags(request()->post('isi_informasi'));
        $data->opsin_lid                = strip_tags(request()->post('opsin_lid'));
        $data->opsin_pam                = strip_tags(request()->post('opsin_pam'));
        $data->opsin_gal                = strip_tags(request()->post('opsin_gal'));
        $data->nomor_surat              = strip_tags(request()->post('nomor_surat'));
        $data->tgl_surat                = request()->post('tgl_surat');
        $data->hasil                    = strip_tags(request()->post('hasil'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengamanan.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data               = PengamananSumberDaya::findOrFail($id);

        return view('admin.pengamanan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data               = PengamananSumberDaya::findOrFail($id);
        $kecamatans         = Kecamatan::orderBY('name')->get();

        return view('admin.pengamanan.edit', compact('data', 'kecamatans'));
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
        $data = PengamananSumberDaya::findOrFail($id);
        request()->validate([
            'kecamatan_id'          => 'required|integer',
            'tgl'                   => 'required|date',
            'sumber_informasi'      => 'nullable|string',
            'isi_informasi'         => 'nullable|string',
            'tahapan_dik'           => 'nullable|string',
            'tahapan_pratut'        => 'nullable|string',
            'tahapan_tut'           => 'nullable|string',
            'tahapan_eksekusi'      => 'nullable|string',
            'lama_pidana'           => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data->kecamatan_id             = strip_tags(request()->post('kecamatan_id'));
        $data->tgl                      = request()->post('tgl');
        $data->sumber_informasi         = strip_tags(request()->post('sumber_informasi'));
        $data->isi_informasi            = strip_tags(request()->post('isi_informasi'));
        $data->opsin_lid                = strip_tags(request()->post('opsin_lid'));
        $data->opsin_pam                = strip_tags(request()->post('opsin_pam'));
        $data->opsin_gal                = strip_tags(request()->post('opsin_gal'));
        $data->nomor_surat              = strip_tags(request()->post('nomor_surat'));
        $data->tgl_surat                = request()->post('tgl_surat');
        $data->hasil                    = strip_tags(request()->post('hasil'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengamanan.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PengamananSumberDaya::destroy($id);

        return response()->json($data);
    }

    public function filter()
    {
        return view('admin.pengamanan.filter');
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
        $data = PengamananSumberDaya::orderBy('updated_at', 'DESC')->whereYear('tgl', '=', $year)
            ->whereMonth('tgl', '=', $bulan)
            ->get();

        return view('admin.pengamanan.show', compact('data', 'month', 'year', 'atas_nama', 'jabatan', 'nama', 'nip', 'today'));
    }
}
