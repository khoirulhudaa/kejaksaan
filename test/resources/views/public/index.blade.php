<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/bs/css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/index.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Otopet website</title>
    <style>
      .fa-play {
        position: absolute;
        border-radius: 1000px;
        background-color: #fff;
        font-size: 40px;
        width: 70px;
        height: 70px;
        left: 50%;
        top: 40%;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: 0.3s;
        animation: play 1.3s ease infinite;
      }
      @keyframes play {
        0% {
          transform: scale(1);
          filter: brightness(100%);
        }
        50% {
          transform: scale(0.9) rotate(10deg);
          filter: brightness(80%);
        }
        100% {
          transform: scale(1);
          filter: brightness(100%);
        }
      }
      .fa-play:hover {
        transform: scale(0.94);
        filter: brightness(88%);
        transition: 0.3s;
      }
    </style>
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="{{ asset('frontend/assets/img/navbar-logo.png') }}" alt=""> Otopet</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="margin-left: auto;">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#profile">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#aspirasi">Aspirasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#filosofi">Filosofi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#kegiatan">Kegiatan</a>
              </li>
              <li class="nav-item login">
                <a class="nav-link" href="{{ route('adminLogin') }}" style="color: white;">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <section class="heroes">
        <div class="hero-left">
          <h1>Otopianus Petrus Tebai</h1>
          <p>Anggota DPD RI terpilih mewakili daerah pemilihan Papua pada Pemilu 2019</p>
          <a href="#profile"><button class="btn-danger btn-dangers">Selengkapnya</button></a>
        </div>
        <div class="hero-right">
          <!-- <i class="fas fa-play"></i> -->
          <video controls="false" class="video" autoplay="true">
            <source src="{{ asset('frontend/assets/video/alam.mp4') }}" type="video/mp4" />
          </video>
        </div>
      </section>

      <section class="aspirasi" id="profile">        
        <div class="aspirasi-left">
          <div class="content-aspirasi">
            <h3>Otopianus Petrus Tebai</h3>
            <p>
              Otopianus P. Tebai, (lahir di Modio, Dogiyai, Papua, 05 Oktober 1991; umur 29 tahun), adalah 
              anggota DPD RI terpilih mewakili daerah pemilihan Papua pada Pemilu 2019. Sebelum terpilih sebagai 
              anggota MPR RI/[1]DPD RI, Otopianus adalah seorang tokoh pemuda papua yang pekerja keras Mulai dari 
              menjadi Pengojek Hingga Terakhir tenaga honorer hingga dilantik menjadi Senator Papua.
  
              Nama lengkap pria kelahiran Modio, Dogiyai, Papua, tanggal 5 Oktober 1991 ini adalah Otopianus Petrus Tebai.
              Ia akrab disapa ‘Otopet’. Pria yang menikah dengan Editha Tekege dan memiliki 7 orang anak ini 
              (Jakson Paulus Gaibii Tebai, Rosalina Tebai, Maya Tebai (Alm) Sonny Habel Tebai, Rafael Wadibi Tebai 
              ( Alm) Clarita Tebai, Daud Kobehawi Tebai dan Maria Tebai), lahir dari pasangan Leonard Tebai, S.Sos, 
              M.Kes (seorang mantri) dan Maria Kedeikoto, Amd. Kep, S.Kep (seorang perawat), pasangan asli Papua, yang 
              menjalani hidup dan kehidupan di Tanah Papua, dengan sederhana. Sejak kecil, Otopet memiliki sejuta mimpi. 
              Salah satu mimpinya adalah ia ingin mengubah Papua dan kehidupan masyarakat di sana menjadi lebih baik
            </p>
            <a href={{ route('profile') }}><button class="btn-danger btn-dangers">Selengkapnya</button></a>
          </div>
        </div>
        <div class="aspirasi-right" id="aspirasi">
            <form>
              <img src="{{ asset('frontend/assets/img/hero-logo.png') }}" alt="">
              <p class="pp">Salurkan Aspirasi Anda</p>
              <hr>          
              <div class="wrap-form">
                <div class="wrap-form-left"> 
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label lbl2">Nama</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label lbl1">Masukkan Aspirasi Anda</label>
                    <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                  </div>
                  <button type="button" class="btn-aspirasix" id="btn-submit">Kirim sekarang</button>
                </div>
                <div class="wrap-form-right">
                  <div class="sosmed">
                    <a href="https://facebook.com/otopianusp.tebai">
                      <img src="{{ asset('frontend/assets/icons/facebook.png') }}" alt="">
                      <h4>Facebook</h4>
                    </a>
                  </div>
                  <div class="sosmed">
                    <a href="https://twitter.com/otopianusp.tebai">
                      <img src="{{ asset('frontend/assets/icons/twitter.png') }}" alt="">
                      <h4>Facebook</h4>
                    </a>
                  </div>
                  <div class="sosmed">
                    <a href="gmail.com">
                      <img src="{{ asset('frontend/assets/icons/gmail.png') }}" alt="">
                      <h4>otopianusp.tebai@gmail.com</h4>
                    </a>
                  </div>
                </div>
              </div>
            </form>
          </div>
      </section>

      <section class="filosofi" id="filosofi">
        <div class="wrap-fls">
          <div class="fls">
            <img src="{{ asset('frontend/assets/img/search.png') }}" alt="fls">
            <p>
              DOU adalah Bahasa Suku Mee-Papua yang artinya "MELIHAT", dimana Para Penasehat Tokoh Tua Suku Mee 
              Biasa Menasehati agar ANAK MUDA tidak salah jalan dalam menjalankan kehidupan sehari-hari dan kehidupan 
              selanjutnya serta Takut akan Tuhan harus Nomor Satu.
            </p>
            <div class="arrow" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
          <div class="fls">
            <img src="{{ asset('frontend/assets/img/artificial-intelligence.png') }}" alt="fls">
            <p>
              GAI adalah Bahasa Suku Mee-Papua yang artinya "BERPIKIR", dimana Para Penasehat Tokoh Tua Suku Mee
              Biasa Menasehati agar ANAK MUDA tidak salah mengerjakan pekerjaan yang seharus dikerjakan. Sehingga 
              harus dikerjakan sesuai dengan Kebutuhan dan Pokok yang dibutuhkan didalam...
            </p>
            <div class="arrow" data-bs-toggle="modal" data-bs-target="#exampleModal2">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
          <div class="fls">
            <img src="{{ asset('frontend/assets/img/accelerate.png') }}" alt="fls">
            <p>
              EKOWAI adalah Bahasa Suku Mee-Papua yang artinya "BEKERJA", dimana Para Penasehat Tokoh Tua Suku Mee 
              Biasa Menasehati agar ANAK MUDA Kalu tidak bekerja tidak makan, untuk hari ini dan untuk hari esok, maka 
              bekerjalah untuk hidup, membantu orang lain yang sedang bekerja...
            </p>
            <div class="arrow" data-bs-toggle="modal" data-bs-target="#exampleModal3">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </section>
	  
	 	<section class="artikel" id="kegiatan">
			<h2>Info Kegiatan Kami</h2>
			<p class="p">
				Cari tahu yang kami lakukan untuk masyarakat dalam membangun negeri
        	</p>
          	<div class="wrap-artikel">
            	@foreach ($events as $event )
            	<div class="card">
              		<a href={{ route('detail', $event->slug) }}>
                		<div class="card-img">
                  			<img src="{{ asset("img/article/$event->thumbnail") }}" alt="img">
                		</div>
                		<div class="card-content">
                  			<p>{{ $event->title }}</p>
                  			<span>{{ date('d M Y', strtotime($event->created_at)) }}</span>
                		</div>
              		</a>
            	</div>
            	@endforeach
          	</div>
          	<a href={{ route('events') }} class="ffd"><button class="btn-danger btn-dangers2">Selengkapnya</button></a>
      	</section>

      <footer>
        <small>&copy;Copyright by Otopet</small>
      </footer>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">DOU - Melihat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p style="line-height: 2em;">
                DOU adalah Bahasa Suku Mee-Papua yang artinya "MELIHAT", dimana Para Penasehat Tokoh Tua Suku Mee Biasa 
                Menasehati agar ANAK MUDA tidak salah jalan dalam menjalankan kehidupan sehari-hari dan kehidupan selanjutnya 
                serta Takut akan Tuhan harus Nomor Satu. (DAA, OMA TENAI, MOGAI TETAI,PUYA MANA TEWEGAI, OWA DAA DLL, merujuk 
                pada 10 Perintah ALLAH. Melihat/Menanggapi pada letak Pokok Persolannya.
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">GAI - Berpikir</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p style="line-height: 2em;">
                GAI adalah Bahasa Suku Mee-Papua yang artinya "BERPIKIR", dimana Para Penasehat Tokoh Tua Suku Mee 
                Biasa Menasehati agar ANAK MUDA tidak salah mengerjakan pekerjaan yang seharus dikerjakan. Sehingga
                harus dikerjakan sesuai dengan Kebutuhan dan Pokok yang dibutuhkan didalam menjalan kehidupan sehari-hari 
                dan atau dimasa depan. Pemberitahuan hal-hal pokok dasar hidup agar ANAK MUDA tidak salah menganalisa/berpikir.
                menindaklanjut berbagai persolan yang kita hadapi.
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">EKOWAI - Bekerja</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p style="line-height: 2em;">
                EKOWAI adalah Bahasa Suku Mee-Papua yang artinya "BEKERJA", dimana Para Penasehat Tokoh Tua Suku Mee Biasa 
                Menasehati agar ANAK MUDA Kalu tidak bekerja tidak makan, untuk hari ini dan untuk hari esok, maka bekerjalah 
                untuk hidup, membantu orang lain yang sedang bekerja, mengerjakan agar berkehidupan pada keadilan dan kesejahteran
                bagi semua orang. 
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        document.querySelector('.video').addEventListener('click', () => {
          document.querySelector('.fa-play').style.transition = '1s';
          document.querySelector('.fa-play').style.opacity = 0;
        })
      </script>
      <script src="{{ asset('backend/modules/jquery.min.js') }}"></script>
      <script src="{{ asset('frontend/bs/js/bootstrap.min.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
        $(document).ready(function() {
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $('#btn-submit').click(function() {
            var formData = {
              name:$('#exampleInputPassword1').val(),
              message :$('#exampleInputEmail1').val()
            };
            var ajaxurl = '{{ route('sendMessage') }}';
            $.ajax({
              type: "POST",
              url: ajaxurl,
              data: formData,
              dataType: 'json',
              success: function(data) {
                  console.log(data)
                  if (data.code == 200) {
                    toastr.success('Pesan terkirim!')
                  }
              },
              error: function(data) {
                  console.log(data)
              }
            });
          });
        })
      </script>
</body>
</html>