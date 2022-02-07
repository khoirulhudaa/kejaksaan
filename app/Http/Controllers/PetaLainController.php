<?php

namespace App\Http\Controllers;

use App\Models\Narkotika;
use App\Models\Pengobatan;
use App\Models\Posko;
use App\Models\Umum;
use Illuminate\Http\Request;

class PetaLainController extends Controller
{
    public function index()
    {
        $narkotika  = Narkotika::all();
        $umum       = Umum::all();
        $obat       = Pengobatan::all();
        $posko      = Posko::all();

        return view('admin.peta-lain.index', compact('narkotika', 'umum', 'obat', 'posko'));
    }

    public function search()
    {
        $id = $_GET['id'];
        $narkotika  = Narkotika::with('kecamatan')->where('kecamatan_id', $id)->get();
        $umum       = Umum::with('kecamatan')->where('kecamatan_id', $id)->get();
        $obat       = Pengobatan::with('kecamatan')->where('kecamatan_id', $id)->get();
        $posko      = Posko::with('kecamatan')->where('kecamatan_id', $id)->get();

        return array($narkotika, $umum, $obat, $posko);
    }
}
