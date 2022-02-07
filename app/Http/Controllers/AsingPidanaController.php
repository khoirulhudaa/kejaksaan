<?php

namespace App\Http\Controllers;

use App\Models\AsingPidana;
use App\Models\BiodataWNA;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class AsingPidanaController extends Controller
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
            return datatables()->of(AsingPidana::with('biodata')
                ->orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('biodata', 'admin.asing-pidana.biodata')
                ->addColumn('action', 'admin.asing-pidana.action')
                ->rawColumns(['biodata', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.asing-pidana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $biodata            = BiodataWNA::with('country')->orderBy('name')->get();
        $kecamatan          = Kecamatan::orderBy('name')->get();

        return view('admin.asing-pidana.create', compact('biodata', 'kecamatan'));
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
            'tgl'                   => 'required|date',
            'biodata_id'            => 'required|integer',
            'kecamatan'             => 'nullable|integer',
            'locus'                 => 'nullable|date',
            'tindak_pidana'         => 'nullable|string',
            'tahapan_dik'           => 'nullable|string',
            'tahapan_pratut'        => 'nullable|string',
            'tahapan_tut'           => 'nullable|string',
            'tahapan_eksekusi'      => 'nullable|string',
            'lama_pidana'           => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data = new AsingPidana();
        $data->tgl                      = request()->post('tgl');
        $data->biodata_id               = strip_tags(request()->post('biodata_id'));
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan'));
        $data->locus                    = strip_tags(request()->post('locus'));
        $data->tindak_pidana            = strip_tags(request()->post('tindak_pidana'));
        $data->tahapan_dik              = strip_tags(request()->post('tahapan_dik'));
        $data->tahapan_pratut           = strip_tags(request()->post('tahapan_pratut'));
        $data->tahapan_tut              = strip_tags(request()->post('tahapan_tut'));
        $data->tahapan_eksekusi         = strip_tags(request()->post('tahapan_eksekusi'));
        $data->lama_pidana              = strip_tags(request()->post('lama_pidana'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.asing-pidana.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data               = AsingPidana::findOrFail($id);

        return view('admin.asing-pidana.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data               = AsingPidana::findOrFail($id);
        $biodatas           = BiodataWNA::orderBY('name')->get();
        $kecamatans         = Kecamatan::orderBY('name')->get();

        return view('admin.asing-pidana.edit', compact('data', 'biodatas', 'kecamatans'));
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
        $data = AsingPidana::findOrFail($id);
        request()->validate([
            'tgl'                   => 'required|date',
            'biodata_id'            => 'required|integer',
            'kecamatan'             => 'nullable|integer',
            'locus'                 => 'nullable|date',
            'tindak_pidana'         => 'nullable|string',
            'tahapan_dik'           => 'nullable|string',
            'tahapan_pratut'        => 'nullable|string',
            'tahapan_tut'           => 'nullable|string',
            'tahapan_eksekusi'      => 'nullable|string',
            'lama_pidana'           => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data->tgl                      = request()->post('tgl');
        $data->biodata_id               = strip_tags(request()->post('biodata_id'));
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan'));
        $data->locus                    = strip_tags(request()->post('locus'));
        $data->tindak_pidana            = strip_tags(request()->post('tindak_pidana'));
        $data->tahapan_dik              = strip_tags(request()->post('tahapan_dik'));
        $data->tahapan_pratut           = strip_tags(request()->post('tahapan_pratut'));
        $data->tahapan_tut              = strip_tags(request()->post('tahapan_tut'));
        $data->tahapan_eksekusi         = strip_tags(request()->post('tahapan_eksekusi'));
        $data->lama_pidana              = strip_tags(request()->post('lama_pidana'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.asing-pidana.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AsingPidana::destroy($id);

        return response()->json($data);
    }

    public function filter()
    {
        return view('admin.asing-pidana.filter');
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
        $data = AsingPidana::with('biodata')->orderBy('updated_at', 'DESC')->orderBy('updated_at', 'DESC')->orderBy('updated_at', 'DESC')->whereYear('tgl', '=', $year)
            ->whereMonth('tgl', '=', $bulan)
            ->get();

        return view('admin.asing-pidana.show', compact('data', 'month', 'year', 'atas_nama', 'jabatan', 'nama', 'nip', 'today'));
    }
}
