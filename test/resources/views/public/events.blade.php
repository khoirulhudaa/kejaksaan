<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/bs/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/style.css') }}">
    <title>Artikel</title>
</head>
<body>
    <!-- Article Hero -->
    <div class="border-0 text-white article-hero">
        <img src="{{ asset('frontend/assets/img/hero-logo.png') }}" class="card-img" alt="article">
        <div class="card-img-overlay py-5 px-5">
            <h3 class="card-title mt-4 w-5 sm-w-100 mb-3 title-highlight">{{ $newest[0]->title }}</h3>
            <p class="card-text article-content">{{ Str::limit(strip_tags($newest[0]->content), 150, '...') }}</p>
            <a href="{{ route('detail', $newest[0]->slug) }}"><button class="btn btn-article btnn text-white px-4 py-2 my-4">Baca Artikel</button></a>
            <a href="{{ route('detail', $newest[0]->slug) }}"><button class="btn btn-article2 text-white px-4 py-2 my-4">Baca Artikel</button></a>
        </div>
    </div>

    <!-- Article Cards -->
    <div class="d-flex flex-wrap px-0 mt-5 justify-content-between mx-auto article-container">
        @foreach ($data as $x )  
        <a href="{{ route('detail', $x->slug) }}">
            <div class="card my-5 border article-card">
                <img src="{{ asset("img/article/$x->thumbnail") }}" class="card-img-top" alt="article">
                <div class="card-body px-4 py-3">
                    <h5 class="card-title mb-3" style="font-weight: bold;">{{ $x->title}}</h5>
                    <p class="card-text"><span class="fw-bold">Admin</span> - {{ date('d M Y', strtotime($x->created_at)) }}</p>
                    <p class="card-text"><span>{{ Str::limit(strip_tags($x->content), 150, '...') }}</p>
                    <a href="{{ route('detail', $x->slug) }}" class="btn text-white px-4 py-2 mt-3 btn-article">Baca Artikel</a>
                </div>
            </div>
        </a> 
        @endforeach
    </div>
    <footer class="d-flex align-self-center text-white justify-content-center mt-4">
        <p>©Copyright by Otopet</p>
    </footer>
    <script src="{{ asset('frontend/bs/js/bootstrap.min.js') }}"></script>
</body>
</html>