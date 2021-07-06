 <!-- Header-->
 <header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./"><img src=" {{ asset('backend/images/Logo-Web.png') }} " alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2-web.png" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src=" {{ asset('backend/images/admin.jpg') }}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="#"><i class="fa fa- user"></i>Profil</a>

                    <a class="nav-link" href="#"><i class="fa fa -cog"></i>Pengaturan</a>

                    {{-- <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                            {{ __('Log out') }}
                        </x-dropdown-link> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <a class="nav-link" href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();"><i class="fa fa-power -off"></i>Keluar</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- /#header -->
