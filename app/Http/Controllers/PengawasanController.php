<?php

namespace App\Http\Controllers;

use App\Models\BiodataWNA;
use App\Models\Kecamatan;
use App\Models\Negara;
use App\Models\Pengawasan;
use Illuminate\Http\Request;

class PengawasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            return datatables()->of(Pengawasan::with('biodata')
                ->orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('biodata', 'admin.pengawasan.negara')
                ->addColumn('action', 'admin.pengawasan.action')
                ->rawColumns(['biodata', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pengawasan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $biodatas               = BiodataWNA::orderBy('name')->get();
        $kecamatan             = Kecamatan::orderBy('name')->get();

        return view('admin.pengawasan.create', compact('biodatas', 'kecamatan'));
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
            'negara_id'             => 'required|integer',
            'tk'                    => 'nullable|string',
            'kecamatan'             => 'required|integer',
            'locus'                 => 'nullable|date',
            'mhs'                   => 'nullable|string',
            'peneliti'              => 'nullable|string',
            'keluarga'              => 'nullable|string',
            'rohaniawan'            => 'nullable|string',
            'pendatang_ilegal'      => 'nullable|string',
            'usaha'                 => 'nullable|string',
            'sosbud'                => 'nullable|string',
            'wisata'                => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data = new Pengawasan();
        $data->tgl                      = request()->post('tgl');
        $data->biodata_id               = strip_tags(request()->post('negara_id'));
        $data->tk                       = strip_tags(request()->post('tk'));
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan'));
        $data->mhs                      = strip_tags(request()->post('mhs'));
        $data->locus                    = strip_tags(request()->post('locus'));
        $data->peneliti                 = strip_tags(request()->post('peneliti'));
        $data->keluarga                 = strip_tags(request()->post('keluarga'));
        $data->rohaniawan               = strip_tags(request()->post('rohaniawan'));
        $data->pendatang_ilegal         = strip_tags(request()->post('pendatang_ilegal'));
        $data->usaha                    = strip_tags(request()->post('usaha'));
        $data->sosbud                   = strip_tags(request()->post('sosbud'));
        $data->wisata                   = strip_tags(request()->post('wisata'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengawasan.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data               = Pengawasan::findOrFail($id);

        return view('admin.pengawasan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data                   = Pengawasan::findOrFail($id);
        $negaras                = BiodataWNA::orderBy('name')->get();
        $kecamatans             = Kecamatan::orderBy('name')->get();

        return view('admin.pengawasan.edit', compact('data', 'negaras', 'kecamatans'));
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
        $data = Pengawasan::findOrFail($id);
        request()->validate([
            'tgl'                   => 'required|date',
            'negara_id'             => 'required|integer',
            'tk'                    => 'nullable|string',
            'kecamatan'             => 'required|integer',
            'locus'                 => 'nullable|date',
            'mhs'                   => 'nullable|string',
            'peneliti'              => 'nullable|string',
            'keluarga'              => 'nullable|string',
            'rohaniawan'            => 'nullable|string',
            'pendatang_ilegal'      => 'nullable|string',
            'usaha'                 => 'nullable|string',
            'sosbud'                => 'nullable|string',
            'wisata'                => 'nullable|string',
            'keterangan'            => 'nullable|string',
        ], $this->customMessages);

        $data->tgl                      = request()->post('tgl');
        $data->biodata_id               = strip_tags(request()->post('negara_id'));
        $data->tk                       = strip_tags(request()->post('tk'));
        $data->kecamatan_id             = strip_tags(request()->post('kecamatan'));
        $data->mhs                      = strip_tags(request()->post('mhs'));
        $data->locus                    = strip_tags(request()->post('locus'));
        $data->peneliti                 = strip_tags(request()->post('peneliti'));
        $data->keluarga                 = strip_tags(request()->post('keluarga'));
        $data->rohaniawan               = strip_tags(request()->post('rohaniawan'));
        $data->pendatang_ilegal         = strip_tags(request()->post('pendatang_ilegal'));
        $data->usaha                    = strip_tags(request()->post('usaha'));
        $data->sosbud                   = strip_tags(request()->post('sosbud'));
        $data->wisata                   = strip_tags(request()->post('wisata'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.pengawasan.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pengawasan::destroy($id);

        return response()->json($data);
    }

    public function filter()
    {
        return view('admin.pengawasan.filter');
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
        $data = Pengawasan::with('biodata')->orderBy('updated_at', 'DESC')->orderBy('updated_at', 'DESC')->whereYear('tgl', '=', $year)
            ->whereMonth('tgl', '=', $bulan)
            ->get();

        return view('admin.pengawasan.show', compact('data', 'month', 'year', 'atas_nama', 'jabatan', 'nama', 'nip', 'today'));
    }
}
