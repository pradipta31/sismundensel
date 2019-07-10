<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header">
             <b><img src="{{asset('backend/images/denpasar.png')}}" alt="homepage" class="dark-logo" /></b>
                </div>
                <div class="col-md-7 align-self-center">
                   <h4 class="text-primary" style="margin-left: 100px">Sistem Informasi Imunisasi Anak Berbasis Web Di Puskesmas Induk Denpasar Selatan II</h4>
                </div>
                
                <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-10">
                    {{-- <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li> --}}
                </ul>
                <b><img src="{{asset('backend/images/puskes.png')}}" alt="homepage" class="dark-logo" /></b>
                    <ul class="navbar-nav my-lg-8>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-caret-down"></i> {{Auth::user()->username}}
                                @if(Auth::user()->level == 'admin')
                                    <img src="{{asset('backend/images/8.png')}}" alt="user" class="profile-pic" />
                                @else
                                    <img src="{{asset('backend/images/admin.jpg')}}" alt="user" class="profile-pic" />
                                @endif
                            </a>
                            <div>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> 
                                        Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>