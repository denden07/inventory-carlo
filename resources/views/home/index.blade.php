<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Admin Login</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="{{asset('css/css.css')}}">


</head>

<body id="login-body">


    

    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form method="post" action="{{ route('login') }}">
                @csrf
                <h1>Sabon Factory Ilocos Norte</h1>

                <input id="email" type="email" class=" @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <input id="password" type="password" class="@error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <a href="#">Forgot your password?</a>
                <button type="submit">{{ __('Login') }}</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">

                </div>
                <div class="overlay-panel overlay-right">
                    <img class="login-image" src="{{asset('pics/home.png')}}" alt="">
                    <p class="login-image-text">Inventory Management System</p>
                    <span>Powered by: Marc Aldrin Dela Cruz</span>
                </div>
            </div>
        </div>
    </div>




</body>
</html>