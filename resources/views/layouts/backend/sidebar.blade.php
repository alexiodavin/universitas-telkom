<div class="sidebar">
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex p-0"> --}}
    <div class="image" style="text-align: center;">
        <center>
            {{-- <img src="{{ auth()->user()->foto ? asset('photo/user/'.auth()->user()->foto) : asset('photo/user.png') }}" class="" alt="User Image" style="width:50%;">
                <br>
                <br> --}}
            <span style="color :white;">
                @if (auth()->user()->dosen)
                    {{ auth()->user()->dosen->nama }}<br>
                    {{ auth()->user()->dosen->nip }}<br>
                    @if (session('auth_login') == 'dosen')
                        @if (session('role_dosen') == null)
                            {{ LIST_STRING_ROLE[auth()->user()->role->id] }}
                        @elseif(session('role_dosen') == 'pembimbing')
                            DOSEN PEMBIMBING
                        @elseif(session('role_dosen') == 'penguji')
                            DOSEN PENGUJI
                        @elseif(session('role_dosen') == 'wali')
                            DOSEN WALI
                        @endif
                    @elseif(session('auth_login') == 'koordinator_pa')
                        KOORDINATOR PA
                    @elseif(session('auth_login') == 'kaprodi')
                        KAPRODI
                    @endif
                @elseif (auth()->user()->mahasiswa)
                    {{ auth()->user()->mahasiswa->nama }}<br>
                    {{ auth()->user()->mahasiswa->nim }}<br>
                    {{ LIST_STRING_ROLE[auth()->user()->role->id] }}
                @else
                    {{ auth()->user()->admin->nama }}<br>
                    {{ LIST_STRING_ROLE[auth()->user()->role->id] }}
                @endif
                <br>
                {{ strtoupper(\App\Models\Prodi::find(auth()->user()->prodi_id)->nama ?? '') }}
            </span>
        </center>
    </div>
    {{-- </div> --}}

    <nav>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">MENU</li>
            <li class="nav-item">
                <a href="{{ route('backend.dashboard') }}"
                    class="nav-link {{ Request::is('dashboard') || Request::is('dashboard/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if (auth()->user()->role_id == IS_ADMIN)
                <li class="nav-item">
                    <a href="{{ route('backend.admin.periode') }}"
                        class="nav-link {{ Request::is('admin/periode') || Request::is('admin/periode/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Periode Sidang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.periode-semester') }}"
                        class="nav-link {{ Request::is('admin/periode-semester') || Request::is('admin/periode-semester/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Periode Semester</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.dosen-koor-pa') }}"
                        class="nav-link {{ Request::is('admin/dosen-koor-pa') || Request::is('admin/dosen-koor-pa/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Koordinator PA</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.prodi') }}"
                        class="nav-link {{ Request::is('admin/prodi') || Request::is('admin/prodi/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Prodi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.role-dosen') }}"
                        class="nav-link {{ Request::is('admin/role-dosen') || Request::is('admin/role-dosen/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Role Dosen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.nilai-mutu') }}"
                        class="nav-link {{ Request::is('admin/nilai-mutu') || Request::is('admin/nilai-mutu/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Nilai Mutu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.dosen-kaprodi') }}"
                        class="nav-link {{ Request::is('admin/dosen-kaprodi') || Request::is('admin/dosen-kaprodi/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Kaprodi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.mahasiswa') }}"
                        class="nav-link {{ Request::is('admin/mahasiswa') || Request::is('admin/mahasiswa/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.dosen') }}"
                        class="nav-link {{ Request::is('admin/dosen') || Request::is('admin/dosen/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Dosen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.ruangan') }}"
                        class="nav-link {{ Request::is('admin/ruangan') || Request::is('admin/ruangan/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Ruangan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.jadwal.prasidang') }}"
                        class="nav-link {{ Request::is('admin/upload-daftar-mahasiswa/prasidang/input-jadwal-prasidang') || Request::is('admin/upload-daftar-mahasiswa/prasidang/input-jadwal-prasidang/*') || Request::is('admin/jadwal/prasidang') || Request::is('admin/jadwal/prasidang/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Jadwal Prasidang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.jadwal.sidang') }}"
                        class="nav-link {{ Request::is('admin/jadwal/sidang') || Request::is('admin/jadwal/sidang/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Jadwal Sidang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.nilai') }}"
                        class="nav-link {{ Request::is('admin/nilai/mahasiswa') || Request::is('admin/nilai/mahaiswa/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Nilai Mahasiswa</p>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role_id == IS_MAHASISWA)
                <li
                    class="nav-item {{ Request::is('mahasiswa/nilai-proposal*') || Request::is('mahasiswa/nilai-prasidang*') || Request::is('mahasiswa/nilai-sidang*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('mahasiswa/nilai-proposal*') || Request::is('mahasiswa/nilai-prasidang*') || Request::is('mahasiswa/nilai-sidang*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-plus"></i>
                        <p>Nilai</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.mahasiswa.nilai-proposal') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nilai Proposal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.mahasiswa.nilai-prasidang') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nilai Prasidang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.mahasiswa.nilai-sidang') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nilai Sidang</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Request::is('mahasiswa/jadwal-prasidang*') || Request::is('mahasiswa/jadwal-sidang*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('mahasiswa/jadwal-prasidang*') || Request::is('mahasiswa/jadwal-sidang*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-plus"></i>
                        <p>
                            Jadwal
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.mahasiswa.jadwal-prasidang') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jadwal Prasidang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.mahasiswa.jadwal-sidang') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jadwal Sidang</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.mahasiswa.ta') }}"
                        class="nav-link {{ Request::is('mahasiswa/ta') || Request::is('mahasiswa/ta/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>TA / PA</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.mahasiswa.histori-ta') }}"
                        class="nav-link {{ Request::is('mahasiswa/histori-ta') || Request::is('mahasiswa/histori-ta/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Histori TA / PA</p>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role_id == IS_DOSEN)
                @if (session('auth_login') == 'dosen')
                    @if (session('role_dosen') == null)
                        <li
                            class="nav-item {{ Request::is('dosen/daftar-mahasiswa/bimbingan*') || Request::is('dosen/daftar-mahasiswa/sidang*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('dosen/daftar-mahasiswa/bimbingan*') || Request::is('dosen/daftar-mahasiswa/sidang*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Dosen

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('backend.dosen.daftar-mahasiswa.bimbingan') }}"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dosen Pembimbing</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('backend.dosen.nilai-mahasiswa.proposal') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dosen Penguji</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('backend.dosen.daftar-mahasiswa') }}" class="nav-link">
                                        {{-- <a href="{{ route('backend.dosen.daftar-mahasiswa.sidang') }}" class="nav-link"> --}}
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dosen Wali</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if (session('role_dosen') == 'pembimbing')
                        <li
                            class="nav-item {{ Request::is('dosen/daftar-mahasiswa/bimbingan*') || Request::is('dosen/daftar-mahasiswa/sidang*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('dosen/daftar-mahasiswa/bimbingan*') || Request::is('dosen/daftar-mahasiswa/sidang*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Daftar Mahasiswa

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('backend.dosen.daftar-mahasiswa.bimbingan') }}"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bimbingan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if (session('role_dosen') == 'penguji')
                        <li
                            class="nav-item {{ Request::is('dosen/nilai-mahasiswa/proposal*') || Request::is('dosen/nilai-mahasiswa/prasidang*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('dosen/nilai-mahasiswa/proposal*') || Request::is('dosen/nilai-mahasiswa/prasidang*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Nilai Mahasiswa

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('backend.dosen.nilai-mahasiswa.proposal') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Proposal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('backend.dosen.nilai-mahasiswa.prasidang') }}"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Prasidang</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sidang</p>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                    @endif
                    @if (session('role_dosen') == 'wali')
                        <li class="nav-item">
                            <a href="{{ route('backend.dosen.daftar-mahasiswa') }}"
                                class="nav-link {{ Request::is('dosen/daftar-mahasiswa') || Request::is('dosen/daftar-mahasiswa/*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Daftar Mahasiswa</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item {{ Request::is('dosen/daftar-mahasiswa/sidang*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('dosen/daftar-mahasiswa/sidang*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Daftar Mahasiswa</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('backend.dosen.daftar-mahasiswa.sidang') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sidang</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    @endif
                @elseif(session('auth_login') == 'koordinator_pa' &&
                        \DB::table('dosen_koordinator_pa')->whereDosenId(auth()->user()->dosen->id)->first())
                    <li
                        class="nav-item {{ Request::is('koordinator-pa/komponen-nilai/proposal*') || Request::is('koordinator-pa/komponen-nilai/prasidang*') || Request::is('koordinator-pa/komponen-nilai/sidang*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('koordinator-pa/komponen-nilai/proposal*') || Request::is('koordinator-pa/komponen-nilai/prasidang*') || Request::is('koordinator-pa/komponen-nilai/sidang*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>
                                Kelola Komponen Nilai
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.koordinator-pa.komponen-nilai.proposal', ['periode_id' => \DB::table('periode')->orderBy('id', 'DESC')->first()->id]) }}"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Proposal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.koordinator-pa.komponen-nilai.prasidang', ['periode_id' => \DB::table('periode')->orderBy('id', 'DESC')->first()->id]) }}"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Prasidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.koordinator-pa.komponen-nilai.sidang', ['periode_id' => \DB::table('periode')->orderBy('id', 'DESC')->first()->id]) }}"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sidang</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="nav-item {{ Request::is('koordinator-pa/upload-daftar-mahasiswa/proposal*') || Request::is('koordinator-pa/upload-daftar-mahasiswa/prasidang*') || Request::is('koordinator-pa/upload-daftar-mahasiswa/sidang*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('koordinator-pa/upload-daftar-mahasiswa/proposal*') || Request::is('koordinator-pa/upload-daftar-mahasiswa/prasidang*') || Request::is('koordinator-pa/upload-daftar-mahasiswa/sidang*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>
                                Upload Daftar Mahasiswa
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.proposal') }}"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Proposal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.prasidang') }}"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Prasidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.koordinator-pa.upload-daftar-mahasiswa.sidang') }}"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sidang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item {{ Request::is('koordinator-pa/jadwal/prasidang*') || Request::is('koordinator-pa/jadwal/sidang*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('koordinator-pa/jadwal/prasidang*') || Request::is('koordinator-pa/jadwal/sidang*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>
                                Jadwal
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.koordinator-pa.jadwal.prasidang') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Prasidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.koordinator-pa.jadwal.sidang') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sidang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.koordinator-pa.view-jadwal-prasidang') }}"
                            class="nav-link {{ Request::is('koordinator-pa/view-jadwal-prasidang') || Request::is('koordinator-pa/view-jadwal-prasidang/*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>View Jadwal Prasidang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.koordinator-pa.view-jadwal-sidang') }}"
                            class="nav-link {{ Request::is('koordinator-pa/view-jadwal-sidang') || Request::is('koordinator-pa/view-jadwal-sidang/*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>View Jadwal Sidang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.koordinator-pa.view-progress-mahasiswa') }}"
                            class="nav-link {{ Request::is('koordinator-pa/view-progress-mahasiswa') || Request::is('koordinator-pa/view-progress-mahasiswa/*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>View Progress Mahasiswa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.koordinator-pa.view-tidak-lulus-sidang') }}"
                            class="nav-link {{ Request::is('koordinator-pa/view-tidak-lulus-sidang') || Request::is('koordinator-pa/view-tidak-lulus-sidang/*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>View Tidak Lulus Sidang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.koordinator-pa.view-nilai-proposal') }}"
                            class="nav-link {{ Request::is('koordinator-pa/view-nilai-proposal') || Request::is('koordinator-pa/view-nilai-proposal/*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>View Nilai Proposal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.koordinator-pa.view-nilai-prasidang') }}"
                            class="nav-link {{ Request::is('koordinator-pa/view-nilai-prasidang') || Request::is('koordinator-pa/view-nilai-prasidang/*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>View Nilai Prasidang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.koordinator-pa.view-nilai-sidang') }}"
                            class="nav-link {{ Request::is('koordinator-pa/view-nilai-sidang') || Request::is('koordinator-pa/view-nilai-sidang/*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>View Nilai Sidang</p>
                        </a>
                    </li>
                @elseif(session('auth_login') == 'kaprodi' &&
                        \DB::table('dosen_kaprodi')->whereDosenId(auth()->user()->dosen->id)->first())
                    <li
                        class="nav-item {{ Request::is('kaprodi/data-mahasiswa/proposal*') || Request::is('kaprodi/data-mahasiswa/prasidang*') || Request::is('kaprodi/data-mahasiswa/sidang*') || Request::is('kaprodi/data-mahasiswa/lulus-sidang*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('kaprodi/data-mahasiswa/proposal*') || Request::is('kaprodi/data-mahasiswa/prasidang*') || Request::is('kaprodi/data-mahasiswa/sidang*') || Request::is('kaprodi/data-mahasiswa/lulus-sidang*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>
                                Data Mahasiswa
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.kaprodi.data-mahasiswa.proposal') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Mahasiswa
                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proposal
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.kaprodi.data-mahasiswa.prasidang') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Mahasiswa
                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prasidang
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.kaprodi.data-mahasiswa.sidang') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Mahasiswa Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.kaprodi.data-mahasiswa.lulus-sidang') }}"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Data Mahasiswa
                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Lulus Sidang)
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item {{ Request::is('kaprodi/view-grafik/mahasiswa*') || Request::is('kaprodi/view-grafik/sidang-per-angkatan*') || Request::is('kaprodi/view-grafik/lulus-tepat-waktu*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('kaprodi/view-grafik/mahasiswa*') || Request::is('kaprodi/view-grafik/sidang-per-angkatan*') || Request::is('kaprodi/view-grafik/lulus-tepat-waktu*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-plus"></i>
                            <p>
                                View Grafik
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.kaprodi.view-grafik.mahasiswa') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Progress PA per
                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mahasiswa
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.kaprodi.view-grafik.sidang-per-angkatan') }}"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Progress Sidang Per
                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Angkatan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.kaprodi.view-grafik.lulus-tepat-waktu') }}"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Lulus Sidang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endif
            <li class="nav-item">
                <a href="{{ route('backend.profile') }}"
                    class="nav-link {{ Request::is('profile') || Request::is('profile/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Akun</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
