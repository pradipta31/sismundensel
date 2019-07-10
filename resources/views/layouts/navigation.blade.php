<div class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                @if(Auth::user()->level == 'admin')
                    <li>
                        <a href="{{url('/admin')}}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                       <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-hospital-o"></i><span class="hide-menu">Puskesmas</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('admin/puskesmas/tambah-puskesmas')}}">Tambah Puskesmas </a></li>
                            <li><a href="{{url('admin/puskesmas/data-puskesmas')}}">Data Puskesmas </a></li>
                        </ul>
                    </li>
                     <li>
                        <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Pasien</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('admin/pasien/tambah-pasien')}}">Tambah Pasien </a></li>
                            <li><a href="{{url('admin/pasien/data-pasien')}}">Data Pasien </a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Imunisasi</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('admin/imunisasi/tambah-imunisasi')}}">Tambah Imunisasi </a></li>
                            <li><a href="{{url('admin/imunisasi/data-imunisasi')}}">Data Imunisasi </a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow  " href="#" aria-expanded="false"><i class="f   fa fa-calendar-plus-o"></i><span class="hide-menu">Program Imunisasi</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('admin/program/tambah-program')}}">Tambah Program Imunisasi</a></li>
                            <li><a href="{{url('admin/program/data-program')}}">Data Program Imunisasi </a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow  " href="#" aria-expanded="false"><i class="f   fa fa-camera"></i><span class="hide-menu">Dokumetasi</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('admin/dokumentasi/tambah-dokumentasi')}}">Tambah Dokumentasi </a></li>
                            <li><a href="{{url('admin/dokumentasi/data-dokumentasi')}}">Data Dokumentasi </a></li>
                        </ul>
                    </li>
                @elseif(Auth::user()->level == 'kepmas')
                   <li>
                    <li>
                        <a href="{{url('kepmas')}}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bullhorn"></i><span class="hide-menu">Pengumuman </span></a>
                        <ul aria-expanded="false" class="collapse">
                             <li><a href="{{url('kepmas/announcement/tambah-announcement')}}">Tambah Pengumuman </a></li>
                             <li><a href="{{url('kepmas/announcement/data-announcement')}}">Data Pengumuman</a></li>
                        </ul>
                     <li>
                        <a href="{{url('kepmas/pasien/data-pasien')}}"><i class="fa fa-user"></i>Pasien</a>
                    </li>
                    <li>
                        <a href="{{url('kepmas/imunisasi/data-imunisasi')}}"><i class="fa fa-medkit"></i>Imunisasi</a>
                    </li>
                    <li>
                        <a href="{{url('kepmas/program/data-program')}}"><i class=" fa fa-calendar-plus-o"></i>Program Imunisasi</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>