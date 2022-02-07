
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/bs/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style/responsive.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/icons/css/all.min.css') }}">
    <title>Login</title>
    <style>
          .fa-home {
            font-size: 30px;
            border-radius: 10000px;
            width: 60px;
            height: 60px;
            margin-top: 45px;
            display: flex;
            position: absolute;
            right: 40px;
            top: -10px;
            color: white;
            text-align: center;
            justify-content: center;
            cursor: pointer;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
            background-color: rgb(39, 39, 39);
            transition: 0.4s;
        }
        .fa-home:hover {
            filter: brightness(80%);
            transform: scale(0.9);
            transition: 0.4s;
        }
        @media  screen and (max-width: 650px) {
            .fa-home {
                display: none;
            }
        }
        @media  screen and (min-width: 500px) and (max-width: 900px) {
            .fa-home {
                display: none;
            }
            .login-box {
                margin-left: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 px-0 top">
                <div class="login">
                    <p class="oto">Otopet</p>
                    <img src="{{ asset('frontend/assets/img/adli-wahid-SAnAJGMxKCY-unsplash.jpg') }}" alt="culture">
                </div>
            </div>

            <!-- Form Login -->
            <div class="col-lg-6 col-md-6 col-sm-12 px-5 login-box bottom">
                <a href="/"><i class="fas fa-home"></i></a>
                <h5 class="mx-5 fs-2 fw-bold mb-4 px-1">Login</h5>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3 px-5 mb-3">
                        <label for="login">Username or Email</label>
                        <input id="login" type="email" class="form-control {{ $errors->has('username') || $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('username') ?: old('email') }}" name="login" tabindex="1" autofocus>
                        @if ($errors->has('username') || $errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3 px-5 mb-5 mt-3">
                        <label for="password" class="form-label fs-5 mx-1">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <button class="btn rounded-pill mx-5 py-2 text-white px-4 btn-login">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('frontend/bs/js/bootstrap.min.js') }}"></script>
</body>
</html>