<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

</head>
<body class="main-facture" style="font-family :  'Poppins', sans empattement !important; ">

    {{-- <style>
        .signin {
            font-size: 12px;
            text-align: center;
            margin-top: 78px;
        }
        .form{
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .login-form{
            top: 90px;
        }
        /* .form input{
            padding-left: 0px;
        } */
        .submit{
            margin-top: 72px;
        }
    </style> --}}
    <style>

       .login-form{
        margin-bottom: 150px;
       }


     </style>

    <div class="login-page" >
        <!-- the form-->

        <div class="login-form" style="top:70px;">

            <div class="signin" >
                <h1 style="font-size:30px !important; font-weight:bold; margin-top:18px !important; ">Forgot Password</h1> <br>

            </div>
            <!-- form-->
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                @method('post')
                
                <div class="email form">
                    {{-- <label for="email">Email Address</label> --}}
                    <i class='bx bx-envelope' ></i>
                    <input type="text" id="email" name="email" placeholder="Email Address" value="{{ $email ?? old('email') }}" required style="width: 300px !important; ">
                    {{-- <input type="text" name="token" value="{{ $token }}"> --}}




                </div>
                <span class =" text-danger "> @error( 'email' ) {{$message}} @enderror </span>
{{--
                <div class="password form">

                    <i class='bx bx-lock-alt'></i>
                    <input type="password" id="newpassword" name="password" placeholder="New Password"  required style="width: 300px !important;">

                </div>

                <div class="password form">

                    <i class='bx bx-lock-alt'></i>
                    <input type="password" id="confirmpassword" name="password" placeholder="Confirm Password" required style="width: 300px !important;">

                </div> --}}

                <div class="submit" style="  margin-top: 80px !important;">
                    <input type="submit" value="Confirm"style="margin-bottom:20px">
                </div>

            </form>


            {{-- @foreach ($posts as $post)
            <h2>{{ $post->nom }}</h2>
            @endforeach --}}


        </div>

    </div>










</body>
</html>
