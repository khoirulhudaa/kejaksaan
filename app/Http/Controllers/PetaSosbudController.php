<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use App\Models\Ketertiban;
use App\Models\Konflik;
use App\Models\Pemberdayaan;
use App\Models\Pembinaan;
use App\Models\Pembukuan;
use App\Models\PengawasanBarang;
use App\Models\PengawasanKeagamaan;
use App\Models\PengawasanKepercayaan;
use App\Models\PengawasanMedia;
use App\Models\PengawasanOrganisasi;

class PetaSosbudController extends Controller
{
    public function index()
    {
        $barcet = PengawasanBarang::all();
        $import = PengawasanBarang::all();
        $pembukuan = Pembukuan::all();
        $media = PengawasanMedia::all();
        $pakem = PengawasanKepercayaan::all();
        $penodaan = PengawasanKeagamaan::all();

        $budaya = Budaya::all();
        $pemberdayaan = Pemberdayaan::all();
        $ormas = PengawasanOrganisasi::all();
        $konflik = Konflik::all();
        $tramtibum = Ketertiban::all();
        $pembinaan = Pembinaan::all();

        return view('admin.peta-sosbud.index', compact('barcet', 'import', 'pembukuan', 'media', 'pakem', 'penodaan', 'budaya', 'pemberdayaan', 'ormas', 'konflik', 'tramtibum', 'pembinaan'));
    }

    public function search()
    {
        $id = $_GET['id'];
        $barcet = PengawasanBarang::with('kecamatan')->where('kecamatan_id', $id)->get();
        $import = PengawasanBarang::with('kecamatan')->where('kecamatan_id', $id)->get();
        $pembukuan = Pembukuan::with('kecamatan')->where('kecamatan_id', $id)->get();
        $media = PengawasanMedia::with('kecamatan')->where('kecamatan_id', $id)->get();
        $pakem = PengawasanKepercayaan::with('kecamatan')->where('kecamatan_id', $id)->get();
        $penodaan = PengawasanKeagamaan::with('kecamatan')->where('kecamatan_id', $id)->get();

        $budaya = Budaya::with('kecamatan')->where('kecamatan_id', $id)->get();
        $pemberdayaan = Pemberdayaan::with('kecamatan')->where('kecamatan_id', $id)->get();
        $ormas = PengawasanOrganisasi::with('kecamatan')->where('kecamatan_id', $id)->get();
        $konflik = Konflik::with('kecamatan')->where('kecamatan_id', $id)->get();
        $tramtibum = Ketertiban::with('kecamatan')->where('kecamatan_id', $id)->get();
        $pembinaan = Pembinaan::with('kecamatan')->where('kecamatan_id', $id)->get();

        return array($barcet, $import, $pembukuan, $media, $pakem, $penodaan, $budaya, $pemberdayaan, $ormas, $konflik, $tramtibum, $pembinaan);
    }
}
