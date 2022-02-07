<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/bs/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/style.css') }}">
    <title>Detail Artikel</title>
    <style>
        p {
            line-height: 2em;
        }
                
        .artikel {
            position: relative;
            width: 100vw;
            display: flex;
            flex-direction: column;
            margin-bottom: 120px;
            justify-content: center;
            height: max-content;
        }

        .wrap-artikel {
            width: 100vw;
            margin-left: auto;
            margin-top: 40px;
            display: flex;
            margin-right: auto;
            flex-wrap: wrap;
        }

        .artikel h2 {
            font-size: 40px;
            margin-top: 60px;
            margin-left: 30px;
            font-weight: bold;
        }

        .artikel .p {
            color: #090829;
            margin-left: 30px;
        }

        .artikel .card {
            position: relative;
            width: 30%;
            height: 410px;
            cursor: pointer;
            border-radius: 10px;
            overflow: hidden;
            margin-left: 30px;
            background-size: contain;
            transition: 0.4s;
        }

        .artikel .card-img {
            overflow: hidden;
            height: 85%;
        }

        .artikel .card-content {
            padding-top: 10px;
            padding-left: 20px;
            height: 25%;
            padding-bottom: 10px;
        }

        .artikel .card:hover {
            transition: 0.4s;
            transform: scale(0.98);
        }

        .artikel .card-content p {
            font-weight: bold;
            font-size: 22px;
            color: black;
        }

        .artikel .card-content span {
            font-size: 16px;
            color: black;
            position: relative;
            bottom: 16px;
        }

        a {
            text-decoration: none;
        }

        .artikel .card img {
            width: 100%;
            height: 100%;
        }
        .btn-dangers2 {
            position: relative;
            width: 200px;
            margin-top: 4px;
            height: 50px;
            border-radius: 5px;
            margin-left: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: auto;
            margin-top: 50px;
            outline: none;
            border:none
        }
        .ffd {
            text-decoration: none;
        }
        .contentx {
            padding:  0 40px 0 40px;
            text-align: justify;
        }
        .opentitle {
            position: absolute;
            width: 70vw;
            margin-left: 30px;
        }
        .banner-article h2 {
            z-index: 999;
            font-size: 40px;
            margin-top: 100px;
            line-height: 1.5em;
            font-weight: bold;
        }
        .banner-article p {
            position: absolute;
            line-height: 2em;
            z-index: 999;
        }
        .btn-dangers {
            width: 200px;
            margin-top: 50px;
            height: 50px;
            border-radius: 5px;
            outline: none;
            border:none
        }

        @media screen and (max-width: 650px) {
            .banner-article  {
                width: 100vw;
                margin-left: -24px;
                margin-top: -90px;
                height: max-content;
                position: relative;
                border-bottom: 1px solid grey;
            }
            .banner-article::before {
               display: none;
            }
            .article-hero2 {
                position: relative;
                left: -20px;
            }
            .banner-article img {
                display: none;
            }
            .article-hero2 {
                width: 100vw;
                height: max-content;
            }
            .banner-article img {
                width: 100vw;
            }
            .opentitle {
                position: absolute;
                bottom: 60px;
                width: 90vw;
                color: black;
            }
            .opentitle h2 {
                color: black;
                font-size: 26px;
            }
            .card-img2 {
                color: black;
                height: 50vh;
                width: 100vw;
            }
            .contentx {
                padding:  0;
                text-align: left;
                width: 100vw;
                position: relative;
                left: 27px;
                height: max-content;
            }
            .contentx p {
                width: 100vw;
                padding: 0 20px 0 10px;
                margin-left: 0px;
            }
            .wrap-artikel {
                flex-direction: column;
            }
            .artikel .card {
            position: relative;
            width: 90vw;
            height: max-content;
            margin-bottom: 40px;
            cursor: pointer;
            border-radius: 10px;
            overflow: hidden;
            margin-left: auto;
            margin-right: auto;
            background-size: contain;
            transition: 0.4s;
        }
        .banner-article {
            width: 100vw;
            height: 50vh;
            left: 30px;
        }
        .artikel h2 {
            margin-left: 14px;
        }
        .artikel .p {
            width: 90vw;
            margin-left: 16px;
        }
    }
    </style>
</head>
<body>
    <div class="card border-0 text-white text-center article-hero2">
        <!--   Article Hero   -->
        <div class="banner-article">
            <div class="opentitle"> 
                <h2>{{ $data[0]->title }}</h2>
                <p>Admin - {{ date('d M Y', strtotime($data[0]->created_at)) }}</p>
            </div>
            <img src="{{ asset("img/article"). '/' . $data[0]->thumbnail }}" class="card-img2" alt="article">
        </div>
        
        <!--   Article Content   -->
        <div class="text-dark text-justify my-5 contentx">
            <p>
                {!! $data[0]->content !!}
            </p> 
        </div>
    </div>

    <section class="artikel">
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

    <footer class="d-flex align-self-center text-white justify-content-center mt-4">
        <p>©Copyright by Otopet</p>
    </footer>
    <script src="{{ asset('frontend/bs/js/bootstrap.min.js') }}"></script>
</body>
</html>
