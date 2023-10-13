<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"defer></script>
   {{-- <script src="dist/bindings/inputmask.binding.js"></script> --}}
    {{-- lien profile --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    <link rel="stylesheet" href="{{ asset('css/client.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addclient.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addfacture.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addproducts.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/affichage.css') }}">
</head>
<body class="main-facture" style="font-family :  'Poppins', sans empattement !important;" >

    @include('navbar')

    @include('sidebar')
    @yield('content')


{{-- <script>
    let btn = document.querySelector(".bx-menu");
    let sidebar=document.querySelector(".sidebar");
    let logo = document.querySelector(".logo-name");
    let tootlip = document.querySelectorAll(".tootlip");
    let links = document.querySelectorAll(".links");
    let profile=document.querySelector(".profile-detail");
    let logout=document.querySelector(".bx-log-out");


    document.querySelector(".logo-content").addEventListener("click", function(){
        console.log(tootlip);
        if(sidebar.offsetWidth == 65){
            sidebar.style.width = "200px";
            logo.style.display="block";
            logo.style.opacity="1";
            btn.style.left="90%";
            tootlip.forEach(element => {
                element.style.display="none";
            });
            links.forEach(element => {
                element.style.display="block";
            });
            profile.style.opacity="1";
            logout.style.opacity="1";
            logout.style.left="88%";

        }

        else{
            sidebar.style.width = "65px";
            logo.style.opacity="0";
            btn.style.left="48%";
            tootlip.forEach(element => {
                element.style.display="block";
            });
            links.forEach(element => {
                element.style.display="none";
            });
            logout.style.opacity="1";
            profile.style.opacity="0";
            logout.style.left="45%";

    }
});




</script> --}}

</body>
</html>
