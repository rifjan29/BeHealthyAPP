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
                    <span class="text-muted p-2" style="font-weight: bold">{{ Session::get('name') }}</span>
                    <img class="user-avatar rounded-circle" src="{{ asset(Session::get('photos') != null ? 'uploads/profile/'.Session::get('photos') : 'uploads/profile/avatar-icon.jpg' ) }}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    {{-- {{-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Profil</a> --}}
                    <a class="nav-link" href="{{ route('edit-password')}}"><i class="fa fa -cog"></i>Reset Password</a>
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
