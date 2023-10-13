<style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
</style>

<div class="aside-content">

<div class='sidebar'>
    <div class="logo-content">
        <div class="logo">

            <div class="logo-name">Azimut BS</div>
            <i class='bx bx-menu'></i>
        </div>

    </div>
    <ul class="sidebar-navlist">
        {{-- <li id='search'>

                <i class='bx bx-search-alt-2'></i>
                <input type="text" value="" name="search" placeholder="Search...">
                    <span class="tootlip">Search</span>
        </li> --}}

        <li id="facture">
            <a href="/facture">
                <i class='bx bxs-file-plus'></i>
                <span class="links">Factures</span>
            </a>
            <span class="tootlip">Factures</span>
        </li>

        <li id="produit">
            <a href="/product">
                <i class="bi bi-cart-check-fill"></i>
                <span class="links">Products</span>
            </a>
            <span class="tootlip">Products</span>
        </li>

        <li id="client">
            <a href="/client">
                <i class="fa-solid fa-user-group"></i>
                <span class="links">Clients</span>
            </a>
            <span class="tootlip">Clients</span>
        </li>

        <li id="user">
            <a href="/user">
                <i class="fa-solid fa-circle-user"></i>
                <span class="links">Users</span>
            </a>
            <span class="tootlip">Users</span>
        </li>

    </ul>

    <div class="profile-content">
        <div class="profile">
            <div class="profile-detail">
                <img src="{{ asset('assets/images/profile_pic.png') }}" alt="">
                <div class="detail">
                    <div class="name">AYADI Naila</div>
                    {{-- <div class="job">Student</div> --}}
                </div>
            </div>
        </div>
        <form action="{{ route('logout') }}" png
        method="POST">
            @csrf
           <button type="submit"><i class='bx bx-log-out'></i></button>
        </form>

    </div>




</div>

</div>






















{{-- first essay --}}

