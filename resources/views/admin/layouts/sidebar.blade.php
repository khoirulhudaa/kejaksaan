<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#" class="logo">
                Kejari Pagar Alam
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#" class="logo">
                {{-- <img src="{{ asset('img/logo.jpeg') }}" width="50" alt="navbar brand"> --}}
            </a>
        </div>
        <ul class="sidebar-menu">
            {{-- Data --}}
            @if (auth()->user()->isAdmin())
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Tabel</span></a>
                    <ul class="dropdown-menu">
                    <li class="{{ request()->segment(2) == 'kecamatan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.kecamatan.index') }}">Kecamatan</a></li>
                    <li class="{{ request()->segment(2) == 'kelurahan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.kelurahan.index') }}">Kelurahan</a></li>
                    <li class="{{ request()->segment(2) == 'agama' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.agama.index') }}">Agama</a></li>
                    <li class="{{ request()->segment(2) == 'pendidikan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pendidikan.index') }}">Pendidikan</a></li>
                    <li class="{{ request()->segment(2) == 'legalitas-perkawinan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.legalitas-perkawinan.index') }}">Legitimasi Perkawinan</a></li>
                    <li class="{{ request()->segment(2) == 'pekerjaan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pekerjaan.index') }}">Pekerjaan</a></li>
                    <li class="{{ request()->segment(2) == 'suku-bangsa' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.suku-bangsa.index') }}">Suku Bangsa</a></li>
                    <li class="{{ request()->segment(2) == 'negara' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.negara.index') }}">Negara</a></li>
                    <li class="{{ request()->segment(2) == 'tinggal-sementara' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.tinggal-sementara.index') }}">Tinggal Sementara WNA</a></li>
                    <li class="{{ request()->segment(2) == 'kunjungan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.kunjungan.index') }}">Kunjungan WNA</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Master</span></a>
                    <ul class="dropdown-menu">
                    <li class="{{ request()->segment(2) == 'wni' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.wni.index') }}">Biodata WNI</a></li>
                    <li class="{{ request()->segment(2) == 'wna' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.wna.index') }}">Biodata WNA</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Kartu TIK</span></a>
                    <ul class="dropdown-menu">
                    <li class="{{ request()->segment(3) == 'biodata' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.biodata.index') }}">Biodata</a></li>
                    <li class="{{ request()->segment(3) == 'barang' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.barang.index') }}">Barang Cetakan</a></li>
                    <li class="{{ request()->segment(3) == 'organisasi' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.organisasi.index') }}">Organisasi</a></li>
                    <li class="{{ request()->segment(3) == 'terdakwa' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.terdakwa.index') }}">Terdakwa</a></li>
                    <li class="{{ request()->segment(3) == 'media' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.media.index') }}">Pengawasan Media</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Pidum dan Pidsus</span></a>
                    <ul class="dropdown-menu">
                    <li class="{{ request()->segment(2) == 'korupsi' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.korupsi.index') }}">Korupsi</a>
                        </li>
                    <li class="{{ request()->segment(2) == 'narkotika' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.narkotika.index') }}">Narkotika</a></li>
                    <li class="{{ request()->segment(2) == 'umum' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.umum.index') }}">PK-Ting</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Laporan Bulanan</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->segment(2) == 'pencegahan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pencegahan.index') }}">1. Pencegahan dan Penangkalan</a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengawasan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengawasan.index') }}">2. Pengawasan Lalu Lintas Orang Asing</a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'asing-pidana' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.asing-pidana.index') }}">3. WNA yang Terlibat Perkara Tindak Pidana</a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengamanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengamanan.index') }}">
                                4. Pengamanan Sumber Daya Organisasi Kejaksaan
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengawasan_barang' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengawasan_barang.index') }}">
                                5. Pengawasan Barang Cetakan
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengawasan_media' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengawasan_media.index') }}">
                                6. Pengawasan Media Komunikasi
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengobatan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengobatan.index') }}">
                                7. Pengobatan Tradisional
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'kepercayaan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kepercayaan.index') }}">
                                8. Pengawasan Aliran Kepercayaan Masyrakat
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'keagamaan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.keagamaan.index') }}">
                                9. Pengawasan Aliran Keagamaan
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengawasan_organisasi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengawasan_organisasi.index') }}">
                                10. Organisasi Kemasyarakatan
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'ketertiban' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.ketertiban.index') }}">
                                11. Ketertiban dan Ketentraman Umum
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pembinaan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pembinaan.index') }}">
                                12. Pembinaan Masyarakat Taat Hukum
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'konflik' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.konflik.index') }}">
                                13. Pencegahan Konflik Sosial
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'posko' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.posko.index') }}">
                                14. Posko Perwakilan Kejaksaan
                            </a>
                        </li>
                        <br>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Lain-lain</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->segment(2) == 'pancasila' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pancasila.index') }}">
                                Pengamanan Pancasila
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'persatuan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.persatuan.index') }}">
                                Persatuan Indonesia
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'separatis' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.separatis.index') }}">
                                Gerakan Separatis
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'penyelenggaraan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.penyelenggaraan.index') }}">
                                Penyelenggaraan Pemerintah
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'parpol' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.parpol.index') }}">
                                Parpol Pemilu Pilkada
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'terorisme' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.terorisme.index') }}">
                                Terorisme & Radikalisme
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'teritorial' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.teritorial.index') }}">
                                Wilayah Teritorial
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'cyber' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.cyber.index') }}">
                                Cyber Crime
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perkara' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perkara.index') }}">
                                PAM Penaganan Perkara
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pembukuan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pembukuan.index') }}">
                                Sistem Pembukuan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'budaya' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.budaya.index') }}">
                                Ketahanan Budaya
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pemberdayaan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pemberdayaan.index') }}">
                                Pemberdayaan Masyarakat
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'infrastruktur' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.infrastruktur.index') }}">
                                Infrastruktur Jalan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'kereta' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kereta.index') }}">
                                Infrastruktur Kereta
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'bandara' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.bandara.index') }}">
                                Infrastruktur Bandara
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'telekomunikasi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.telekomunikasi.index') }}">
                                Infrastruktur Telekomunikasi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pelabuhan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pelabuhan.index') }}">
                                Infrastruktur Pelabuhan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'listrik' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.listrik.index') }}">
                                Ketenagalistrikan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'energi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.energi.index') }}">
                                Energi Alternatif
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'minyak' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.minyak.index') }}">
                                Minyak & Gas Bumi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'ilmu' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.ilmu.index') }}">
                                IPT
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'smelter' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.smelter.index') }}">
                                Smelter
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'air' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.air.index') }}">
                                Infrastruktur Air
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'tanggul' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.tanggul.index') }}">
                                Tanggul
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'bendungan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.bendungan.index') }}">
                                Bendungan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pertanian' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pertanian.index') }}">
                                Pertanian
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'kelautan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kelautan.index') }}">
                                Kelautan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perumahan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perumahan.index') }}">
                                Perumahan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pariwisata' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pariwisata.index') }}">
                                Pariwisata
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'industri' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.industri.index') }}">
                                Kawasan Industri
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'produksi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.produksi.index') }}">
                                Produksi Intelijen
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pemantauan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pemantauan.index') }}">
                                Pemantauan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'signal' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.signal.index') }}">
                                Intelijen Signal
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'siber' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.siber.index') }}">
                                Intelijen Siber
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'klandestine' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.klandestine.index') }}">
                                Klandestine
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'sdm' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.sdm.index') }}">
                                SDM Intelijen
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'prosedur' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.prosedur.index') }}">
                                Prosedur Aplikasi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'digital' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.digital.index') }}">
                                Digital Forensik
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'berita' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.berita.index') }}">
                                Transmisi Berita Sandi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'kontra' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kontra.index') }}">
                                Kontra Penginderaan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'audit' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.audit.index') }}">
                                Audit Keamanan Informasi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pengamanan-signal' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengamanan-signal.index') }}">
                                Pengamanan Signal
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'sandi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.sandi.index') }}">
                                SDM & Sandi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'lembaga' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.lembaga.index') }}">
                                Lembaga Keuangan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'moneter' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.moneter.index') }}">
                                Moneter
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'asset' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.asset.index') }}">
                                Asset Tracking
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'investasi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.investasi.index') }}">
                                Investasi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perpajakan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perpajakan.index') }}">
                                Perpajakan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'kepabeanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kepabeanan.index') }}">
                                Kepabeanan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'cukai' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.cukai.index') }}">
                                Cukai
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perdagangan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perdagangan.index') }}">
                                Perdagangan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perindustrian' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perindustrian.index') }}">
                                Perindustrian
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'ketenagakerjaan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.ketenagakerjaan.index') }}">
                                Ketenagakerjaan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perkebunan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perkebunan.index') }}">
                                Perkebunan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'kehutanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kehutanan.index') }}">
                                Kehutanan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'lingkungan_hidup' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.lingkungan_hidup.index') }}">
                                Lingkungan Hidup
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perikanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perikanan.index') }}">
                                Perikanan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'agraria' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.agraria.index') }}">
                                Agraria/Tata Ruang
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Pemetaan</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->segment(2) == 'peta-pertahanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-pertahanan') }}">D.IN 2</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta_sosbud' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-sosbud') }}">D.IN 3</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-ekonomi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-ekonomi') }}">D.IN 4</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-pembangunan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-pembangunan') }}">D.IN 5</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-teknologi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-teknologi') }}">D.IN 6</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-lain' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-lain') }}">Lainnya</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->segment(2) == 'user' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.user.index') }}"><i class="fas fa-users"></i> Hak Akses</a>
                </li>
            @elseif ( auth()->user()->isLeader())
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Pemetaan</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->segment(2) == 'peta-pertahanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-pertahanan') }}">D.IN 2</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta_sosbud' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-sosbud') }}">D.IN 3</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-ekonomi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-ekonomi') }}">D.IN 4</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-pembangunan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-pembangunan') }}">D.IN 5</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-teknologi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-teknologi') }}">D.IN 6</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-lain' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-lain') }}">Lainnya</a>
                        </li>
                    </ul>
                </li>
            @elseif ( auth()->user()->isOperator())
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Tabel</span></a>
                    <ul class="dropdown-menu">
                    <li class="{{ request()->segment(2) == 'kecamatan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.kecamatan.index') }}">Kecamatan</a></li>
                    <li class="{{ request()->segment(2) == 'kelurahan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.kelurahan.index') }}">Kelurahan</a></li>
                    <li class="{{ request()->segment(2) == 'agama' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.agama.index') }}">Agama</a></li>
                    <li class="{{ request()->segment(2) == 'pendidikan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pendidikan.index') }}">Pendidikan</a></li>
                    <li class="{{ request()->segment(2) == 'legalitas-perkawinan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.legalitas-perkawinan.index') }}">Legitimasi Perkawinan</a></li>
                    <li class="{{ request()->segment(2) == 'pekerjaan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pekerjaan.index') }}">Pekerjaan</a></li>
                    <li class="{{ request()->segment(2) == 'suku-bangsa' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.suku-bangsa.index') }}">Suku Bangsa</a></li>
                    <li class="{{ request()->segment(2) == 'negara' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.negara.index') }}">Negara</a></li>
                    <li class="{{ request()->segment(2) == 'tinggal-sementara' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.tinggal-sementara.index') }}">Tinggal Sementara WNA</a></li>
                    <li class="{{ request()->segment(2) == 'kunjungan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.kunjungan.index') }}">Kunjungan WNA</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Master</span></a>
                    <ul class="dropdown-menu">
                    <li class="{{ request()->segment(2) == 'wni' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.wni.index') }}">Biodata WNI</a></li>
                    <li class="{{ request()->segment(2) == 'wna' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.wna.index') }}">Biodata WNA</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Kartu TIK</span></a>
                    <ul class="dropdown-menu">
                    <li class="{{ request()->segment(3) == 'biodata' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.biodata.index') }}">Biodata</a></li>
                    <li class="{{ request()->segment(3) == 'barang' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.barang.index') }}">Barang Cetakan</a></li>
                    <li class="{{ request()->segment(3) == 'organisasi' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.organisasi.index') }}">Organisasi</a></li>
                    <li class="{{ request()->segment(3) == 'terdakwa' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.terdakwa.index') }}">Terdakwa</a></li>
                    <li class="{{ request()->segment(3) == 'media' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.media.index') }}">Pengawasan Media</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Pidum dan Pidsus</span></a>
                    <ul class="dropdown-menu">
                    <li class="{{ request()->segment(2) == 'korupsi' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.korupsi.index') }}">Korupsi</a>
                        </li>
                    <li class="{{ request()->segment(2) == 'narkotika' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.narkotika.index') }}">Narkotika</a></li>
                    <li class="{{ request()->segment(2) == 'umum' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.umum.index') }}">PK-Ting</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Laporan Bulanan</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->segment(2) == 'pencegahan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pencegahan.index') }}">1. Pencegahan dan Penangkalan</a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengawasan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengawasan.index') }}">2. Pengawasan Lalu Lintas Orang Asing</a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'asing-pidana' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.asing-pidana.index') }}">3. WNA yang Terlibat Perkara Tindak Pidana</a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengamanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengamanan.index') }}">
                                4. Pengamanan Sumber Daya Organisasi Kejaksaan
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengawasan_barang' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengawasan_barang.index') }}">
                                5. Pengawasan Barang Cetakan
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengawasan_media' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengawasan_media.index') }}">
                                6. Pengawasan Media Komunikasi
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengobatan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengobatan.index') }}">
                                7. Pengobatan Tradisional
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'kepercayaan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kepercayaan.index') }}">
                                8. Pengawasan Aliran Kepercayaan Masyrakat
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'keagamaan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.keagamaan.index') }}">
                                9. Pengawasan Aliran Keagamaan
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pengawasan_organisasi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengawasan_organisasi.index') }}">
                                10. Organisasi Kemasyarakatan
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'ketertiban' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.ketertiban.index') }}">
                                11. Ketertiban dan Ketentraman Umum
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'pembinaan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pembinaan.index') }}">
                                12. Pembinaan Masyarakat Taat Hukum
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'konflik' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.konflik.index') }}">
                                13. Pencegahan Konflik Sosial
                            </a>
                        </li>
                        <br>
                        <li class="{{ request()->segment(2) == 'posko' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.posko.index') }}">
                                14. Posko Perwakilan Kejaksaan
                            </a>
                        </li>
                        <br>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Lain-lain</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->segment(2) == 'pancasila' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pancasila.index') }}">
                                Pengamanan Pancasila
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'persatuan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.persatuan.index') }}">
                                Persatuan Indonesia
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'separatis' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.separatis.index') }}">
                                Gerakan Separatis
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'penyelenggaraan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.penyelenggaraan.index') }}">
                                Penyelenggaraan Pemerintah
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'parpol' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.parpol.index') }}">
                                Parpol Pemilu Pilkada
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'terorisme' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.terorisme.index') }}">
                                Terorisme & Radikalisme
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'teritorial' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.teritorial.index') }}">
                                Wilayah Teritorial
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'cyber' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.cyber.index') }}">
                                Cyber Crime
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perkara' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perkara.index') }}">
                                PAM Penaganan Perkara
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pembukuan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pembukuan.index') }}">
                                Sistem Pembukuan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'budaya' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.budaya.index') }}">
                                Ketahanan Budaya
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pemberdayaan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pemberdayaan.index') }}">
                                Pemberdayaan Masyarakat
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'infrastruktur' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.infrastruktur.index') }}">
                                Infrastruktur Jalan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'kereta' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kereta.index') }}">
                                Infrastruktur Kereta
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'bandara' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.bandara.index') }}">
                                Infrastruktur Bandara
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'telekomunikasi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.telekomunikasi.index') }}">
                                Infrastruktur Telekomunikasi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pelabuhan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pelabuhan.index') }}">
                                Infrastruktur Pelabuhan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'listrik' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.listrik.index') }}">
                                Ketenagalistrikan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'energi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.energi.index') }}">
                                Energi Alternatif
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'minyak' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.minyak.index') }}">
                                Minyak & Gas Bumi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'ilmu' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.ilmu.index') }}">
                                IPT
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'smelter' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.smelter.index') }}">
                                Smelter
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'air' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.air.index') }}">
                                Infrastruktur Air
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'tanggul' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.tanggul.index') }}">
                                Tanggul
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'bendungan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.bendungan.index') }}">
                                Bendungan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pertanian' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pertanian.index') }}">
                                Pertanian
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'kelautan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kelautan.index') }}">
                                Kelautan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perumahan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perumahan.index') }}">
                                Perumahan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pariwisata' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pariwisata.index') }}">
                                Pariwisata
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'industri' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.industri.index') }}">
                                Kawasan Industri
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'produksi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.produksi.index') }}">
                                Produksi Intelijen
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pemantauan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pemantauan.index') }}">
                                Pemantauan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'signal' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.signal.index') }}">
                                Intelijen Signal
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'siber' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.siber.index') }}">
                                Intelijen Siber
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'klandestine' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.klandestine.index') }}">
                                Klandestine
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'sdm' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.sdm.index') }}">
                                SDM Intelijen
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'prosedur' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.prosedur.index') }}">
                                Prosedur Aplikasi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'digital' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.digital.index') }}">
                                Digital Forensik
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'berita' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.berita.index') }}">
                                Transmisi Berita Sandi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'kontra' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kontra.index') }}">
                                Kontra Penginderaan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'audit' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.audit.index') }}">
                                Audit Keamanan Informasi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'pengamanan-signal' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pengamanan-signal.index') }}">
                                Pengamanan Signal
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'sandi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.sandi.index') }}">
                                SDM & Sandi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'lembaga' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.lembaga.index') }}">
                                Lembaga Keuangan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'moneter' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.moneter.index') }}">
                                Moneter
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'asset' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.asset.index') }}">
                                Asset Tracking
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'investasi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.investasi.index') }}">
                                Investasi
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perpajakan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perpajakan.index') }}">
                                Perpajakan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'kepabeanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kepabeanan.index') }}">
                                Kepabeanan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'cukai' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.cukai.index') }}">
                                Cukai
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perdagangan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perdagangan.index') }}">
                                Perdagangan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perindustrian' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perindustrian.index') }}">
                                Perindustrian
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'ketenagakerjaan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.ketenagakerjaan.index') }}">
                                Ketenagakerjaan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perkebunan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perkebunan.index') }}">
                                Perkebunan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'kehutanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.kehutanan.index') }}">
                                Kehutanan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'lingkungan_hidup' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.lingkungan_hidup.index') }}">
                                Lingkungan Hidup
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'perikanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.perikanan.index') }}">
                                Perikanan
                            </a>
                        </li>
                        <li class="{{ request()->segment(2) == 'agraria' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.agraria.index') }}">
                                Agraria/Tata Ruang
                            </a>
                        </li>
                    </ul>
                </li>
            @elseif ( auth()->user()->isUser())
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card"></i> <span>Pemetaan</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->segment(2) == 'peta-pertahanan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-pertahanan') }}">D.IN 2</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta_sosbud' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-sosbud') }}">D.IN 3</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-ekonomi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-ekonomi') }}">D.IN 4</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-pembangunan' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-pembangunan') }}">D.IN 5</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-teknologi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-teknologi') }}">D.IN 6</a>
                        </li>
                        <li class="{{ request()->segment(2) == 'peta-lain' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.peta-lain') }}">Lainnya</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </aside>
</div>
