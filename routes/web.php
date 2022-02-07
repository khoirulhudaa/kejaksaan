<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'Auth\LoginController@adminLogin')->name('adminLogin');

// ROUTE FOR ADMIN ONLY
Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin', 'active', 'check.session'])->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('profile', 'AdminController@profile')->name('profile');
    Route::put('updateProfile', 'AdminController@updateProfile')->name('updateProfile');

    /* Master Data */

    // Kelurahan
    Route::resource('kelurahan', 'KelurahanController');

    // Biodata Terpidana WNI
    Route::resource('wni', 'BiodataWNIController');
    Route::get('wni/search/{id}', 'BiodataWNIController@search')->name('wni.search');

    // Biodata Terpidana WNA
    Route::resource('wna', 'BiodataWNAController');
    Route::get('wna/search/{id}', 'BiodataWNAController@search')->name('wna.search');

    // Kartu TIK Biodata
    Route::resource('tik/biodata', 'TIKBiodataController');

    // Kartu TIK Barang
    Route::resource('tik/barang', 'TIKBarangController');
    Route::get('barang/search/{id}', 'TIKBarangController@search')->name('barang.search');

    // Kartu TIK Organisasi
    Route::resource('tik/organisasi', 'TIKOrganisasiController');

    // Kartu TIK Media
    Route::resource('tik/media', 'TIKMediaController');
    Route::get('media/search/{id}', 'TIKMediaController@search')->name('media.search');

    // Kartu TIK Terdakwa
    Route::resource('tik/terdakwa', 'TIKTerdakwaController');

    /* Pidum Pidsus */

    // Korupsi
    Route::resource('korupsi', 'KorupsiController');
    Route::get('filter', 'KorupsiController@filter')->name('korupsi.filter');
    Route::post('download', 'KorupsiController@download')->name('korupsi.download');

    // Narkotika
    Route::resource('narkotika', 'NarkotikaController');
    Route::get('narkotika_filter', 'NarkotikaController@filter')->name('narkotika.filter');
    Route::post('narkotika_download', 'NarkotikaController@download')->name('narkotika.download');

    // Umum
    Route::resource('umum', 'UmumController');
    Route::get('umum_filter', 'UmumController@filter')->name('umum.filter');
    Route::post('umum_download', 'UmumController@download')->name('umum.download');

    /* Label Intel */

    // Pencegahan dan Penangkalan
    Route::resource('pencegahan', 'PencegahanController');
    Route::get('pencegahan_filter', 'PencegahanController@filter')->name('pencegahan.filter');
    Route::post('pencegahan_download', 'PencegahanController@download')->name('pencegahan.download');

    // Pengawasan WNA
    Route::resource('pengawasan', 'PengawasanController');
    Route::get('pengawasan_filter', 'PengawasanController@filter')->name('pengawasan.filter');
    Route::post('pengawasan_download', 'PengawasanController@download')->name('pengawasan.download');

    // WNA yang terlibat tindak pidana
    Route::resource('asing-pidana', 'AsingPidanaController');
    Route::get('asing_filter', 'AsingPidanaController@filter')->name('asing.filter');
    Route::post('asing_download', 'AsingPidanaController@download')->name('asing.download');

    // Pengamanan Sumber Daya Kejaksaan
    Route::resource('pengamanan', 'PengamananSumberDayaController');
    Route::get('pengamanan_filter', 'PengamananSumberDayaController@filter')->name('pengamanan.filter');
    Route::post('pengamanan_download', 'PengamananSumberDayaController@download')->name('pengamanan.download');

    // Pengawasan Barang Cetakan
    Route::resource('pengawasan_barang', 'PengawasanBarangController');
    Route::get('pengawasan_barang_filter', 'PengawasanBarangController@filter')->name('pengawasan_barang.filter');
    Route::post('pengawasan_barang_download', 'PengawasanBarangController@download')->name('pengawasan_barang.download');

    // Pengawasan Media Komunikasi
    Route::resource('pengawasan_media', 'PengawasanMediaController');
    Route::get('pengawasan_media_filter', 'PengawasanMediaController@filter')->name('pengawasan_media.filter');
    Route::post('pengawasan_media_download', 'PengawasanMediaController@download')->name('pengawasan_media.download');

    // Pengobatan Tradiotional
    Route::resource('pengobatan', 'PengobatanController');
    Route::get('pengobatan_filter', 'PengobatanController@filter')->name('pengobatan.filter');
    Route::post('pengobatan_download', 'PengobatanController@download')->name('pengobatan.download');

    // Pengawasan Aliran Kepercayaan Masyarakat
    Route::resource('kepercayaan', 'PengawasanKepercayaanController');
    Route::get('kepercayaan_filter', 'PengawasanKepercayaanController@filter')->name('kepercayaan.filter');
    Route::post('kepercayaan_download', 'PengawasanKepercayaanController@download')->name('kepercayaan.download');

    // Pengawasan Aliran Keagamaan
    Route::resource('keagamaan', 'PengawasanKeagamaanController');
    Route::get('keagamaan_filter', 'PengawasanKeagamaanController@filter')->name('keagamaan.filter');
    Route::post('keagamaan_download', 'PengawasanKeagamaanController@download')->name('keagamaan.download');

    // Pengawasan Organisasi Kemasyarakatan
    Route::resource('pengawasan_organisasi', 'PengawasanOrganisasiController');
    Route::get('pengawasan_organisasi_filter', 'PengawasanOrganisasiController@filter')->name('pengawasan_organisasi.filter');
    Route::post('pengawasan_organisasi_download', 'PengawasanOrganisasiController@download')->name('pengawasan_organisasi.download');

    // Ketertiban
    Route::resource('ketertiban', 'KetertibanController');
    Route::get('ketertiban_filter', 'KetertibanController@filter')->name('ketertiban.filter');
    Route::post('ketertiban_download', 'KetertibanController@download')->name('ketertiban.download');

    // Pembinaan
    Route::resource('pembinaan', 'PembinaanController');
    Route::get('pembinaan_filter', 'PembinaanController@filter')->name('pembinaan.filter');
    Route::post('pembinaan_download', 'PembinaanController@download')->name('pembinaan.download');

    // Konflik Sosial
    Route::resource('konflik', 'KonflikController');
    Route::get('konflik_filter', 'KonflikController@filter')->name('konflik.filter');
    Route::post('konflik_download', 'KonflikController@download')->name('konflik.download');

    // Posko
    Route::resource('posko', 'PoskoController');
    Route::get('posko_filter', 'PoskoController@filter')->name('posko.filter');
    Route::post('posko_download', 'PoskoController@download')->name('posko.download');

    /* Reference Data */

    // Kecamatan
    Route::resource('kecamatan', 'KecamatanController');

    // Agama
    Route::resource('agama', 'AgamaController');

    // Warga Negara
    Route::resource('warga-negara', 'WargaNegaraController');

    // Pendidikan
    Route::resource('pendidikan', 'PendidikanController');

    // Status Perkawinan
    Route::resource('status-perkawinan', 'StatusPerkawinanController');

    // Legalitas Perkawinan
    Route::resource('legalitas-perkawinan', 'LegalitasPerkawinanController');

    // Pekerjaan
    Route::resource('pekerjaan', 'PekerjaanController');

    // Suku Bangsa
    Route::resource('suku-bangsa', 'SukuBangsaController');

    // Negara
    Route::resource('negara', 'NegaraController');

    // Tinggal Sementara WNA
    Route::resource('tinggal-sementara', 'TinggalSementaraWNAController');

    // Kunjungan WNA
    Route::resource('kunjungan', 'KunjunganWNAController');

    /* Lain - Lain */

    // Pengawasan Barcet
    Route::resource('barcet', 'BarcetController');

    // Import Barcet
    Route::resource('import', 'ImportController');

    // Pengawasan Sistem pembukuan
    Route::resource('pembukuan', 'PembukuanController');

    // PAKEM
    Route::resource('pakem', 'PakemController');

    // Pencegahan Penodaan Agama
    Route::resource('penodaan', 'PenodaanController');

    // Ketahanan Budaya
    Route::resource('budaya', 'BudayaController');

    // Pemberdayaan Masyarakat Desa
    Route::resource('pemberdayaan', 'PemberdayaanController');

    // Pengawasan Ormas
    Route::resource('ormas', 'OrmasController');

    // Tramtibum
    Route::resource('tramtibum', 'TramtibumController');

    // Infrastruktur Jalan
    Route::resource('infrastruktur', 'InfrastrukturController');

    // Infrastruktur Kereta
    Route::resource('kereta', 'KeretaController');

    // Infrastruktur Bandara
    Route::resource('bandara', 'BandaraController');

    // Infrastruktur Telekomunikasi
    Route::resource('telekomunikasi', 'TelekomunikasiController');

    // Infrastruktur Pelabuhan
    Route::resource('pelabuhan', 'PelabuhanController');

    // Ketenagalistrikan
    Route::resource('listrik', 'ListrikController');

    // Energi Alternatif
    Route::resource('energi', 'EnergiController');

    // Minyak dan Gas Bumi
    Route::resource('minyak', 'MinyakController');

    // IPT
    Route::resource('ilmu', 'IlmuController');

    // Smelter
    Route::resource('smelter', 'SmelterController');

    // Infrastruktur Pengolahan Air
    Route::resource('air', 'AirController');

    // Tanggul
    Route::resource('tanggul', 'TanggulController');

    // Bendungan
    Route::resource('bendungan', 'BendunganController');

    // Pertanian
    Route::resource('pertanian', 'PertanianController');

    // Kelautan
    Route::resource('kelautan', 'KelautanController');

    // Perumahan
    Route::resource('perumahan', 'PerumahanController');

    // Pariwisata
    Route::resource('pariwisata', 'PariwisataController');

    // Kawasan Industri
    Route::resource('industri', 'IndustriController');

    // Produksi Intelijen
    Route::resource('produksi', 'ProduksiController');

    // Kawasan Industri
    Route::resource('pemantauan', 'PemantauanController');

    // Kawasan Industri
    Route::resource('signal', 'SignalController');

    // Kawasan Industri
    Route::resource('siber', 'SiberController');

    // Kawasan Industri
    Route::resource('klandestine', 'KlandestineController');

    // Kawasan Industri
    Route::resource('sdm', 'SdmController');

    // Kawasan Industri
    Route::resource('prosedur', 'ProsedurController');

    // Kawasan Industri
    Route::resource('digital', 'DigitalController');

    // Kawasan Industri
    Route::resource('berita', 'BeritaController');

    // Kawasan Industri
    Route::resource('kontra', 'KontraController');

    // Kawasan Industri
    Route::resource('audit', 'AuditController');

    // Kawasan Industri
    Route::resource('pengamanan-signal', 'PengamananController');

    // Kawasan Industri
    Route::resource('sandi', 'SandiController');

    // Kawasan Industri
    Route::resource('lembaga', 'LembagaKeuanganController');

    // Kawasan Industri
    Route::resource('keuangan', 'KeuanganNegaraController');

    // Kawasan Industri
    Route::resource('moneter', 'MoneterController');

    // Kawasan Industri
    Route::resource('asset', 'AssetController');

    // Kawasan Industri
    Route::resource('investasi', 'InventasiController');

    // Kawasan Industri
    Route::resource('perpajakan', 'PerpajakanController');

    // Kawasan Industri
    Route::resource('kepabeanan', 'KepabeananController');

    // Kawasan Industri
    Route::resource('cukai', 'CukaiController');

    // Kawasan Industri
    Route::resource('perdagangan', 'PerdaganganController');

    // Kawasan Industri
    Route::resource('perindustrian', 'PerindustrianController');

    // Kawasan Industri
    Route::resource('ketenagakerjaan', 'KetenagakerjaanController');

    // Kawasan Industri
    Route::resource('perkebunan', 'PerkebunanController');

    // Kawasan Industri
    Route::resource('kehutanan', 'KehutananController');

    // Kawasan Industri
    Route::resource('lingkungan_hidup', 'LingkunganHidupController');

    // Kawasan Industri
    Route::resource('perikanan', 'PerikananController');

    // Kawasan Industri
    Route::resource('agraria', 'AgrariaController');

    // Kawasan Industri
    Route::resource('pancasila', 'PancasilaController');

    // Kawasan Industri
    Route::resource('persatuan', 'PersatuanController');

    // Kawasan Industri
    Route::resource('separatis', 'SeparatisController');

    // Kawasan Industri
    Route::resource('penyelenggaraan', 'PenyelenggaraanController');

    // Kawasan Industri
    Route::resource('parpol', 'ParpolController');

    // Kawasan Industri
    Route::resource('terorisme', 'TerorismeController');

    // Kawasan Industri
    Route::resource('teritorial', 'TeritorialController');

    // Kawasan Industri
    Route::resource('cyber', 'CyberController');

    // Kawasan Industri
    Route::resource('pam', 'PamController');

    // Kawasan Industri
    Route::resource('perkara', 'PerkaraController');

    /* Pemetaan */

    // Sosbud
    Route::get('peta_sosbud', 'PetaSosbudController@index')->name('peta-sosbud');
    Route::get('peta_sosbud/search/{id}', 'PetaSosbudController@search')->name('peta-sosbud.search');

    // Pembangunan
    Route::get('peta_pembangunan', 'PetaPembangunanController@index')->name('peta-pembangunan');
    Route::get('peta_pembangunan/search/{id}', 'PetaPembangunanController@search')->name('peta-pembangunan.search');

    // Teknologi
    Route::get('peta_teknologi', 'PetaTeknologiController@index')->name('peta-teknologi');
    Route::get('peta_teknologi/search/{id}', 'PetaTeknologiController@search')->name('peta-teknologi.search');

    // Ekonomi
    Route::get('peta_ekonomi', 'PetaEkonomiController@index')->name('peta-ekonomi');
    Route::get('peta_ekonomi/search/{id}', 'PetaEkonomiController@search')->name('peta-ekonomi.search');

    // Pertahanan
    Route::get('peta_pertahanan', 'PetaPertahananController@index')->name('peta-pertahanan');
    Route::get('peta_pertahanan/search/{id}', 'PetaPertahananController@search')->name('peta-pertahanan.search');

    // Lainnya
    Route::get('peta_lain', 'PetaLainController@index')->name('peta-lain');
    Route::get('peta_lain/search/{id}', 'PetaLainController@search')->name('peta-lain.search');

    /* Hak Akses */

    Route::resource('user', 'UserController');
});
