
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Facture</title>
</head>
<body class="main-facture" style="font-family :  'Poppins', sans empattement !important; " >
    <div class="login-page">


        <div class="login-form-logo">
            <img class="image-logo" src="{{ asset('assets/images/logo.png') }}" alt="">
        </div>

        <!-- the form-->
        <div class="login-form" >

            <div class="sign-in" >
                <h1 style="font-size:30px !important; font-weight:bold;  " >Sign In</h1> <br>

            </div>
            <!-- form-->
            <form id="form-login" action="{{ route('login') }}" method="POST" >
                @csrf
                @method('post')
                <div class="email form" style="margin-top: 30px !important;">
                    {{-- <label for="email">Email Address</label> --}}
                    <i class='bx bx-envelope' ></i>
                    <input type="text" id="email" name="email" placeholder="Email Address" required " style="width: 300px !important;">
                    {{-- @if ($errors->has('email'))
                    <br>

                            {{ $errors->first('email') }}

                     @endif --}}

                </div>

                <div class="password form">
                    {{-- <label for="password">Password</label> --}}
                    <i class='bx bx-lock-alt'></i>
                    <input type="password" id="password" placeholder="Password" name="password" required style="width: 300px !important;">
                    <i class="bi bi-eye" onclick="showpassword()"></i>
                    {{-- @error('password')
                         <span class="message-erreur">@include('messages')</span>
                     @enderror --}}
                </div>
                {{-- <span class="message-erreur">@include('messages')</span> --}}

                <div class="submit" style="margin-top: 15px !important;">
                    <input type="submit" value="Login" >
                </div>

                {{-- <p><a href="/resetpassword">Forgot password?</a></p> --}}
            </form>
            <p><a href="{{ route("reset") }}" id="forgot-password" >Forgot password?</a></p>
            {{-- @foreach ($posts as $post)
            <h2>{{ $post->nom }}</h2>
            @endforeach --}}
            {{-- style="display:block !important; margin-top: 35px !important;  margin-bottom: 35px !important;" --}}
        </div>

    </div>
</body>
</html>


