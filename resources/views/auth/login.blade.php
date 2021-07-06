<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
      integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
      crossorigin="anonymous">

    {{-- icon --}}
    <link rel="shortcut icon" href=" {{ asset('backend/images/logo2-web.png') }} " type="image/x-icon">

    <!-- style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login-Be Healthy</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;500;600&display=swap');
    *{
        margin: 0px;
        padding: 0px;
        list-style: none;
    }
    body{
        background-color: #e9ecef;
        font-family: 'Poppins', sans-serif;
        font-weight: 200;
    }
    h5{
        font-size: 42px;
        font-weight: 600;
        color: #2b91b2;
    }
    label{
        font-size: 14px;
        font-weight: 500;
        color: #6c757d;
    }
    button[type=submit]{
        background-color: #97d2b7;
        padding: 10px 45px;
        border: none;
    }
    button[type=submit]:hover{
        background-color: #6ca78d;
        border: none;
    }
    button[type=submit]:active{
        background-color: #6ca78d;
        border: none;
    }
    button[type=submit]:focus{
        background-color: #6ca78d;
        border: none;
    }
    button[type=reset]{
        /* background-color: #97d2b7; */
        border: 1px solid grey !important;
        padding: 10px 45px;
        border: none;
    }
    button[type=reset]:hover{
        background-color: grey;
        border: none;
    }
    button[type=reset]:active{
        background-color: grey;
        border: none;
    }
    button[type=reset]:focus{
        background-color: grey;
        border: none;
    }
    .text-login{
        font-size: 14px;
        color: #6c757d;
    }
    .text-copy{
        font-size: 14px;
        font-weight: 200;
        color: #6c757d;}

    /* images style */
    /* img{
        max-width: 100%;
    } */

    .img-box{margin: auto;}
    @media screen and (max-width: 767px) {
        .img-box{
            padding-top: 0px;}
    }
    /* end images style */
    .login-container{margin: 15%;}
    .login-style{padding: 50px 0 50px 50px;}
    </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="container">
            <div class="col-xl-10 col-lg-12 mx-auto shadow-sm p-3 mb-5 bg-body rounded login-container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 no-padding align-self-center">
                        <div class="login-style">
                            <h5 class="mb-2">Selamat Datang</h5>
                            <p class="text-login">Silahkan masuk terlebih dahulu untuk masuk ke halaman Administrator</p>
                            <!-- Session Status -->
                            @error('username')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 12px">
                                Terdapat Kesalahan di <strong>Username atau password</strong>!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @enderror
                            <form action=" {{ route('login') }} " method="POST">
                            @csrf
                                <div class="mb-3">
                                    <!-- Username -->
                                    <label for="" class="mb-2">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" required autofocus>

                                </div>
                                <div>
                                    <!-- password -->
                                    <label for="" class="mb-2">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" data-toggle="password" required autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="mt-2">
                                     <!-- Remember Me -->
                                    <p><input type="checkbox" name="remember" id="remember_me">{{ __(' Remember me')}} </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="" style="margin-right: 5px">
                                        <button type="submit" class="btn btn-primary ">Masuk</button>
                                    </div>
                                    <div class="" >
                                        <button type="reset" class="btn btn-outline-secondary ">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 no-margin no-padding d-flex justify-content-center img-box">
                        <img src="{{ asset('backend/images/logo.png') }}" class="" width="250" alt="Logo Icon">
                    </div>
                    <p class="text-center text-copy"> Copyright &copy; 2021 Be Healthy</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>



{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
