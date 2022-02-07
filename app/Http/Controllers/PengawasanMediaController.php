<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\PengawasanMedia;
use App\Models\TIKMedia;
use Illuminate\Http\Request;

class PengawasanMediaController extends Controller
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
            return datatables()->of(PengawasanMedia::with('media')
                ->orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('media', 'admin.pengawasan-media.media')
                ->addColumn('action', 'admin.pengawasan-media.action')
                ->rawColumns(['media', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pengawasan-media.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan              = Kecamatan::orderBy('name')->get();
        $media                  = TIKMedia::orderBy('nama')->get();

        return view('admin.pengawasan-media.create', compact('kecamatan', 'media'));
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
            'jenis_media'           => 'required|integer',
            'tgl_publikasi'         => 'nullable|date',
            'pimpinan'              => 'nullable|string',
            'konten'                 => 'nullable|string',
            'hasil'                 => 'nullable|string',
            'tindak_lanjut'         => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data = new PengawasanMedia();
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan_id'));
        $data->tgl                      = request()->post('tgl');
        $data->media_id                 = strip_tags(request()->post('jenis_media'));
        $data->tgl_publikasi            = request()->post('tgl_publikasi');
        $data->pimpinan                 = strip_tags(request()->post('pimpinan'));
        $data->konten                   = strip_tags(request()->post('konten'));
        $data->hasil                    = strip_tags(request()->post('hasil'));
        $data->tindak_lanjut            = strip_tags(request()->post('tindak_lanjut'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengawasan_media.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data               = PengawasanMedia::findOrFail($id);

        return view('admin.pengawasan-media.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data               = PengawasanMedia::findOrFail($id);
        $kecamatans         = Kecamatan::orderBY('name')->get();
        $medias             = TIKMedia::orderBY('nama')->get();

        return view('admin.pengawasan-media.edit', compact('data', 'kecamatans', 'medias'));
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
        $data = PengawasanMedia::findOrFail($id);
        request()->validate([
            'kecamatan_id'          => 'required|integer',
            'tgl'                   => 'required|date',
            'jenis_media'           => 'nullable|integer',
            'tgl_publikasi'         => 'nullable|date',
            'pimpinan'              => 'nullable|string',
            'konten'                 => 'nullable|string',
            'hasil'                 => 'nullable|string',
            'tindak_lanjut'         => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data->kecamatan_id             = strip_tags(request()->post('kecamatan_id'));
        $data->tgl                      = request()->post('tgl');
        $data->media_id                 = strip_tags(request()->post('jenis_media'));
        $data->tgl_publikasi            = request()->post('tgl_publikasi');
        $data->pimpinan                 = strip_tags(request()->post('pimpinan'));
        $data->konten                   = strip_tags(request()->post('konten'));
        $data->hasil                    = strip_tags(request()->post('hasil'));
        $data->tindak_lanjut            = strip_tags(request()->post('tindak_lanjut'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengawasan_media.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PengawasanMedia::destroy($id);

        return response()->json($data);
    }

    public function filter()
    {
        return view('admin.pengawasan-media.filter');
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
        $data = PengawasanMedia::orderBy('updated_at', 'DESC')->whereYear('tgl', '=', $year)
            ->whereMonth('tgl', '=', $bulan)
            ->get();

        return view('admin.pengawasan-media.show', compact('data', 'month', 'year', 'atas_nama', 'jabatan', 'nama', 'nip', 'today'));
    }
}
