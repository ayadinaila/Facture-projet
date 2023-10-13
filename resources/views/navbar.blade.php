
<script>
    /** Change the style **/
    function overStyle(object){
       object.style.color = '#D6D5A8';
       // Change some other properties ...
    }

    /** Restores the style **/
    function outStyle(object){
       object.style.color = '#D6D5A8';
       // Restore the rest ...
    }
   </script>

<div class="navbar1">
<nav class="nav1">
{{--
    <div class="left-sidebar">

        <i class="fa-regular fa-angles-right"></i>

    </div> --}}

    <div class="right">

        <ul class="menu12" style="margin-right:20px !important;"  >

            <div class="home">
                {{-- <i class="fa-regular fa-house-chimney"></i> --}}
                <i class="bi bi-house-fill"></i>
                <a href="/home" id='home' class="navlinks" data-active="home" onmouseover="overStyle(this)" onmouseout="outStyle(this)" onclick="getCurrentURL() "><li id="home" >Dashboard</li></a>
            </div>
            {{-- <div class="dashboard" ">
                <i class="fa-regular fa-align-justify"></i>
                <i class='bx bxs-dashboard' ></i>
                <li id="dashboard"><a href="" onmouseover="overStyle(this)" data-active="dashboard"  onmouseout="outStyle(this)"  class="navlinks"><li id="dashboard" >Dashboard</a></li>
            </div> --}}
            <div class="profile">

                {{-- <i class="fa-solid fa-user"></i> --}}
                <i class="fa-solid fa-circle-user"></i>
                <li id="profile"><a href="{{ route('profile',Auth::user()->id) }}" onmouseover="overStyle(this)" data-active="profile" onmouseout="outStyle(this)" class="navlinks" ><li id="profile">Profile</a></li>
            </div>

            <div class="search">

                {{-- <i class="fa-solid fa-user"></i> --}}
                <i class='bx bx-search-alt-2'></i>
                <input type="text" value="" name="search" placeholder="Search..." >
            </div>



        </ul>

    </div>






</nav>
</div>




