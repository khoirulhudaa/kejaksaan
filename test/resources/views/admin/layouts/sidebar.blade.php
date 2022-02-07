<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#" class="logo">
                Admin Panel
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#" class="logo">
                {{-- <img src="{{ asset('img/logo.jpeg') }}" width="50" alt="navbar brand"> --}}
            </a>
        </div>
        <ul class="sidebar-menu">
            {{-- Data --}}
            @if (auth()->user()->isAdmin())
                <li class="{{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ request()->segment(2) == 'ktp' ? 'active' : '' }}">
                    <a href="{{ route('admin.ktp.index') }}" class="nav-link"><i class="fas fa-id-card"></i> <span>Data KTP</span></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span>Cetak</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->segment(2) == 'B' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.B.index') }}">Model B-KWK</a></li>
                        <li class="{{ request()->segment(2) == 'B1' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.B1.index') }}">Model B.1-KWK</a></li>
                        <li class="{{ request()->segment(2) == 'B11' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.B11.index') }}">Model B.1.1-KWK</a></li>
                        <li class="{{ request()->segment(2) == 'B2' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.B2.index') }}">Model B.2-KWK</a></li>
                        <li class="{{ request()->segment(2) == 'F1' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.F1.index') }}">Model F-1 DPD</a></li>
                    </ul>
                </li>
                <li class="{{ request()->segment(2) == 'user' ? 'active' : '' }}">
                    <a href="{{ route('admin.user.index') }}" class="nav-link"><i class="fas fa-users"></i> <span>Hak Akses</span></a>
                </li>
                <li class="{{ request()->segment(2) == 'article' ? 'active' : '' }}">
                    <a href="{{ route('admin.article.index') }}" class="nav-link"><i class="fas fa-newspaper"></i> <span>Article</span></a>
                </li>
                <li class="{{ request()->segment(2) == 'kabupaten' ? 'active' : '' }}">
                    <a href="{{ route('admin.kabupaten.index') }}" class="nav-link"><i class="fas fa-city"></i> <span>Data Kabupaten</span></a>
                </li>
                <li class="{{ request()->segment(2) == 'kecamatan' ? 'active' : '' }}">
                    <a href="{{ route('admin.kecamatan.index') }}" class="nav-link"><i class="fas fa-city"></i> <span>Data Kecamatan</span></a>
                </li>
                <li class="{{ request()->segment(2) == 'desa' ? 'active' : '' }}">
                    <a href="{{ route('admin.desa.index') }}" class="nav-link"><i class="fas fa-city"></i> <span>Data Desa</span></a>
                </li>
                <li class="{{ request()->segment(2) == 'change-password' ? 'active' : '' }}">
                    <a href="{{ route('admin.changePassword') }}" class="nav-link"><i class="fas fa-cogs"></i> <span>Pengaturan</span></a>
                </li>
            @elseif ( auth()->user()->isUser())
                <li class="{{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ request()->segment(2) == 'ktp-by-kabupaten' ? 'active' : '' }}">
                    <a href="{{ route('admin.ktp-by-kabupaten.index') }}" class="nav-link"><i class="fas fa-id-card"></i> <span>Data KTP</span></a>
                </li>
                <li class="{{ request()->segment(2) == 'change-password' ? 'active' : '' }}">
                    <a href="{{ route('admin.changePassword') }}" class="nav-link"><i class="fas fa-cogs"></i> <span>Pengaturan</span></a>
                </li>
            @endif
        </ul>
    </aside>
</div>
