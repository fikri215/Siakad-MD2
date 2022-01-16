<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">SMK Muhammadiyah 2</a>
        </div>
        <div class="sidebar-brand mt-n5">
            <a href="{{ route('home') }}">Jakarta</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">MD 2</a>
        </div>
        <ul class="sidebar-menu">
            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Operator')
                <li class="menu-header">Dashboard</li>
                <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" id="home"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('admin.home') }}" id="adminHome">Dashboard Admin</a>
                        <a class="nav-link" href="{{ route('home') }}" id="adminHome">Jadwal</a>
                    </li>
                </ul>
                </li>
                <li class="menu-header">Managemen Data</li>
                <li>
                    <a class="nav-link" href="{{ route('jadwal.index') }}" id="DataJadwal"><i class="fas fa-calendar"></i> <span>Data Jadwal</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('guru.index') }}" id="DataGuru"><i class="fas fa-user"></i> <span>Data Guru</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('siswa.index') }}" id="DataSiswa"><i class="fas fa-users"></i> <span>Data Siswa</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('kelas.index') }}" id="DataKelas"><i class="fas fa-home"></i> <span>Data Kelas</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('mapel.index') }}" id="DataMapel"><i class="fas fa-book-open"></i> <span>Data Mata Pelajaran</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('user.index') }}" id="DataUSer"><i class="fas fa-user-plus"></i> <span>Data User</span></a>
                </li>
                
                
                <li class="menu-header">Managemen Trash</li>
                <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" id="home"><i class="fas fa-trash"></i><span>Managemen Trash</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('jadwal.trash') }}" id="TrashJadwal"><span>Trash Jadwal</span></a>
                        <a class="nav-link" href="{{ route('guru.trash') }}" id="TrashGuru"><span>Trash Guru</span></a>
                        <a class="nav-link" href="{{ route('siswa.trash') }}" id="TrashSiswa"><span>Trash Siswa</span></a>
                        <a class="nav-link" href="{{ route('kelas.trash') }}" id="TrashKelas"><span>Trash Kelas</span></a>
                        <a class="nav-link" href="{{ route('mapel.trash') }}" id="TrashMapel"><span>Trash MaPel</span></a>
                        <a class="nav-link" href="{{ route('user.trash') }}" id="TrashUSer"><span>Trash User</span></a>
                    </li>
                </ul>
                </li>

                <li class="menu-header">Managemen Nilai</li>
                <li>
                    <a class="nav-link" href="{{ route('ulangan-kelas') }}" id="Ulangan"><i class="fas fa-pen"></i> <span>Nilai Ulangan</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('rapot-kelas') }}" id="Rapot"><i class="fas fa-clipboard"></i> <span>Nilai Rapot</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('predikat') }}" id="Deskripsi"><i class="fas fa-home"></i> <span>Deskripsi Predikat</span></a>
                </li>
            @elseif (Auth::user()->role == 'Guru' && Auth::user()->guru(Auth::user()->id_card))
                <li>
                    <a class="nav-link" href="{{ url('/') }}" id="Home"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('jadwal.guru') }}" id="JadwalGuru"><i class="fas fa-calendar"></i> <span>Jadwal</span></a>
                </li>
                <li class="menu-header">Nilai</li>
                <li>
                    <a class="nav-link" href="{{ route('ulangan.index') }}" id="UlanganGuru"><i class="fas fa-pen"></i> <span>Nilai Ulangan</span></a>
                </li>
                @if (
                    Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel == "Pendidikan Agama" ||
                    Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel == "Pendidikan Pancasila dan Kewarganegaraan"
                )
                    <li>
                        <a class="nav-link" href="{{ route('sikap.index') }}" id="RapotGuru"><i class="fas fa-home"></i> <span>Nilai Sikap</span></a>
                    </li>
                @else
                @endif
                <li>
                    <a class="nav-link" href="{{ route('rapot.index') }}" id="RapotGuru"><i class="fas fa-clipboard"></i> <span>Nilai Rapot</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('nilai.index') }}" id="DescGuru"><i class="fas fa-home"></i> <span>Deskripsi Predikat</span></a>
                </li>
            @elseif (Auth::user()->role == 'Siswa' && Auth::user()->siswa(Auth::user()->no_induk))
                <li>
                    <a class="nav-link" href="{{ url('/') }}" id="Home"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('jadwal.siswa') }}" id="jadwalSiswa"><i class="fas fa-calendar"></i> <span>Jadwal</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('ulangan.siswa') }}" id="UlanganSiswa"><i class="fas fa-pen"></i> <span>Nilai Ulangan</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('rapot.siswa') }}" id="Rapot Siswa"><i class="fas fa-clipboard"></i> <span>Nilai Rapot</span></a>
                </li>
            @endif
        </ul>
        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary btn-lg btn-block">
            <i class="fas fa-power-off"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>
        </div> --}}
    </aside>
</div>