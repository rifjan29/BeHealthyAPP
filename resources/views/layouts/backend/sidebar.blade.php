<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href=" {{ route('dashboard') }} "><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>
                <li class=" {{ request()->routeIs('article') ? 'active' : '' }} ">
                    <a href=" {{ route('article') }} "> <i class="menu-icon ti-write"></i>Artikel </a>
                </li>
                <li class=" {{ request()->routeIs('content') ? 'active' : ''}} ">
                    <a href=" {{ route('content') }} "> <i class="menu-icon ti-heart"></i>Konten </a>
                </li>
                <li class=" {{ request()->routeIs('authors') ? 'active' : '' }} ">
                    <a href=" {{ route('authors') }} "> <i class="menu-icon ti-id-badge"></i>Narator</a>
                </li>
                {{-- <li class=" {{ request()->routeIs('type') ? 'active' : '' }} ">
                    <a href=" {{ route('type') }} "> <i class="menu-icon ti-list"></i>Tipe</a>
                </li> --}}
                {{-- <li class=" {{ request()->routeIs('category') ? 'active' : '' }} ">
                    <a href=" {{ route('category') }} "> <i class=" menu-icon ti-layout-list-thumb"></i>Kategori </a>
                </li> --}}
                <li class="{{ request()->routeIs('pengguna-admin') }}">
                    <a href="{{ route('pengguna-admin') }}"> <i class="menu-icon ti-user"></i>Pengguna</a>
                </li>
                <li>
                    <a href="# "> <i class="menu-icon ti-android"></i>Pengguna Android</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
