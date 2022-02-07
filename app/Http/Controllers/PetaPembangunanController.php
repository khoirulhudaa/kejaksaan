<?php

namespace App\Http\Controllers;

use App\Models\Air;
use App\Models\Bandara;
use App\Models\Bendungan;
use App\Models\Energi;
use App\Models\Ilmu;
use App\Models\Industri;
use App\Models\Infrastruktur;
use App\Models\Kelautan;
use App\Models\Kereta;
use App\Models\Listrik;
use App\Models\Minyak;
use App\Models\Pariwisata;
use App\Models\Pelabuhan;
use App\Models\Pertanian;
use App\Models\Perumahan;
use App\Models\Smelter;
use App\Models\Tanggul;
use App\Models\Telekomunikasi;

class PetaPembangunanController extends Controller
{
    public function index()
    {
        $jalan = Infrastruktur::all();
        $kereta = Kereta::all();
        $bandara = Bandara::all();
        $telekomunikasi = Telekomunikasi::all();
        $pelabuhan = Pelabuhan::all();
        $listrik = Listrik::all();
        $energi = Energi::all();
        $minyak = Minyak::all();
        $ilmu = Ilmu::all();

        $smelter = Smelter::all();
        $air = Air::all();
        $tanggul = Tanggul::all();
        $bendungan = Bendungan::all();
        $pertanian = Pertanian::all();
        $kelautan = Kelautan::all();
        $perumahan = Perumahan::all();
        $pariwisata = Pariwisata::all();
        $industri = Industri::all();

        return view('admin.peta-pembangunan.index', compact('jalan', 'kereta', 'bandara', 'telekomunikasi', 'pelabuhan', 'listrik', 'energi', 'minyak', 'ilmu', 'smelter', 'air', 'tanggul', 'bendungan', 'pertanian', 'kelautan', 'perumahan', 'pariwisata', 'industri'));
    }

    public function search()
    {
        $id = $_GET['id'];
        $jalan = Infrastruktur::with('kecamatan')->where('kecamatan_id', $id)->get();
        $kereta = Kereta::with('kecamatan')->where('kecamatan_id', $id)->get();
        $bandara = Bandara::with('kecamatan')->where('kecamatan_id', $id)->get();
        $telekomunikasi = Telekomunikasi::with('kecamatan')->where('kecamatan_id', $id)->get();
        $pelabuhan = Pelabuhan::with('kecamatan')->where('kecamatan_id', $id)->get();
        $listrik = Listrik::with('kecamatan')->where('kecamatan_id', $id)->get();
        $energi = Energi::with('kecamatan')->where('kecamatan_id', $id)->get();
        $minyak = Minyak::with('kecamatan')->where('kecamatan_id', $id)->get();
        $ilmu = Ilmu::with('kecamatan')->where('kecamatan_id', $id)->get();

        $smelter = Smelter::with('kecamatan')->where('kecamatan_id', $id)->get();
        $air = Air::with('kecamatan')->where('kecamatan_id', $id)->get();
        $tanggul = Tanggul::with('kecamatan')->where('kecamatan_id', $id)->get();
        $bendungan = Bendungan::with('kecamatan')->where('kecamatan_id', $id)->get();
        $pertanian = Pertanian::with('kecamatan')->where('kecamatan_id', $id)->get();
        $kelautan = Kelautan::with('kecamatan')->where('kecamatan_id', $id)->get();
        $perumahan = Perumahan::with('kecamatan')->where('kecamatan_id', $id)->get();
        $pariwisata = Pariwisata::with('kecamatan')->where('kecamatan_id', $id)->get();
        $industri = Industri::with('kecamatan')->where('kecamatan_id', $id)->get();


        return array($jalan, $kereta, $bandara, $telekomunikasi, $pelabuhan, $listrik, $energi, $minyak, $ilmu, $smelter, $air, $tanggul, $bendungan, $pertanian, $perumahan, $pariwisata, $industri);
    }
}
