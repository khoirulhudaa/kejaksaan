<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\KTP;
use App\Models\Province;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class KTPController extends Controller
{
    protected $customMessages = [
        'required'              => ':Attribute harus diisi',
        'unique'                => ':Attribute sudah ada.',
        'integer'               => ':Attribute must be a number.',
        'min'                   => ':Attribute harus :min.',
        'max'                   => ':Attribute tidak boleh lebih dari :max karakter.',
        'exists'                => 'Not found.',
        'kabupaten.required'    => 'Pilih Kabupaten.',
        'jenis_kelamin.required' => 'Pilih Jenis Kelamin.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(KTP::orderBy('updated_at', 'DESC')->get())
                ->addColumn('action', 'admin.ktp.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.ktp.index');
    }

    public function create()
    {
        $provinces = Province::orderBy('prov_name')->get();
        $cities = City::orderBy('city_name')->get();
        $districts = District::orderBy('dis_name')->get();
        $subdistricts = Subdistrict::orderBy('subdis_name')->get();
        return view('admin.ktp.create', compact('provinces', 'cities', 'districts', 'subdistricts'));
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
            'kabupaten'             => 'required',
            'kecamatan'             => 'required',
            'desa'                  => 'required',
            'nik'                   => 'required|integer|unique:k_t_p_s,nik|min:16',
            'nama'                  => 'required|string',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'jenis_kelamin'         => 'required|string',
            'alamat'                => 'required|string',
            'rt'                    => 'required|string',
            'rw'                    => 'required|string',
            'status_perkawinan'     => 'required|string',
            'keterangan'            => 'required|string',
            'photo'                 => 'required',
        ], $this->customMessages);


        $data = new KTP();
        $data->prov_id                  = 1;
        $data->city_id                  = strip_tags(request()->post('kabupaten'));
        $data->dis_id                   = strip_tags(request()->post('kecamatan'));
        $data->subdis_id                = strip_tags(request()->post('desa'));
        $data->nik                      = strip_tags(request()->post('nik'));
        $data->nama                     = strip_tags(request()->post('nama'));
        $data->tempat_lahir             = strip_tags(request()->post('tempat_lahir'));
        $data->tanggal_lahir            = request()->post('tanggal_lahir');
        $data->jenis_kelamin            = strip_tags(request()->post('jenis_kelamin'));
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->rt                       = strip_tags(request()->post('rt'));
        $data->rw                       = strip_tags(request()->post('rw'));
        $data->status_perkawinan        = strip_tags(request()->post('status_perkawinan'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));

        if (request()->hasFile('photo')) {
            $image = request()->file('photo');
            $imageName = rand(1, 99999999999) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/ktp');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(1280, 720)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        } else {
            $data->photo = 'default.jpg';
        }
        $data->save();

        return redirect()->route('admin.ktp.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KTP::findOrFail($id);
        $provinces = Province::orderBy('prov_name')->get();
        $cities = City::orderBy('city_name')->get();
        $districts = District::orderBy('dis_name')->get();
        $subdistricts = Subdistrict::orderBy('subdis_name')->get();
        return view('admin.ktp.edit', compact('data', 'provinces', 'cities', 'districts', 'subdistricts'));
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
        $data = KTP::findOrFail($id);

        request()->validate([
            'kabupaten'             => 'nullable',
            'kecamatan'             => 'nullable',
            'desa'                  => 'nullable',
            'nik'                   => 'required|integer|min:16',
            'nama'                  => 'required|string',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'jenis_kelamin'         => 'required|string',
            'alamat'                => 'required|string',
            'rt'                    => 'required|string',
            'rw'                    => 'required|string',
            'status_perkawinan'     => 'required|string',
            'keterangan'            => 'required|string',
            'photo'                 => 'nullable',
        ], $this->customMessages);

        if (request()->post('kabupaten') == '') {
            $city                  = $data->city_id;
        } else {
            $city                  = strip_tags(request()->post('kabupaten'));
        }

        if (request()->post('kecamatan') == '') {
            $district                  = $data->dis_id;
        } else {
            $district                  = strip_tags(request()->post('kecamatan'));
        }

        if (request()->post('desa') == '') {
            $subdistrict                  = $data->subdis_id;
        } else {
            $subdistrict                  = strip_tags(request()->post('desa'));
        }

        $data->prov_id                  = 1;
        $data->city_id                  = $city;
        $data->dis_id                   = $district;
        $data->subdis_id                = $subdistrict;
        $data->nik                      = strip_tags(request()->post('nik'));
        $data->nama                     = strip_tags(request()->post('nama'));
        $data->tempat_lahir             = strip_tags(request()->post('tempat_lahir'));
        $data->tanggal_lahir            = request()->post('tanggal_lahir');
        $data->jenis_kelamin            = strip_tags(request()->post('jenis_kelamin'));
        $data->alamat                   = strip_tags(request()->post('alamat'));
        $data->rt                       = strip_tags(request()->post('rt'));
        $data->rw                       = strip_tags(request()->post('rw'));
        $data->status_perkawinan        = strip_tags(request()->post('status_perkawinan'));
        $data->keterangan               = strip_tags(request()->post('keterangan'));

        if (request()->hasFile('photo')) {
            if ($data->photo <> 'default.jpg') {
                $fileName = public_path() . '/img/ktp/' . $data->photo;
                File::delete($fileName);
            }

            $image = request()->file('photo');
            $imageName = rand(1, 99999999999) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/ktp');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(1280, 720)->save($imagePath . '/' . $imageName);

            $data->photo = $imageName;
        }
        $data->save();

        return redirect()->route('admin.ktp.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $item = KTP::findOrFail($id);

        if ($item->photo <> 'default.jpg') {
            $fileName2 = public_path() . '/img/ktp/' . $item->photo;
            File::delete($fileName2);
        }

        $itemDelete = $item->delete();

        return response()->json($itemDelete);
    }
}
