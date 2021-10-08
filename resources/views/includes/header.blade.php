<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/images/logo.png" alt="" height="32">
                    </span>
                    <span class="logo-lg">
                        <img src="/images/logo.png" alt="" height="70">
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/images/logo.png" alt="" height="32">
                    </span>
                    <span class="logo-lg">
                        <img src="/images/logo.png" alt="MedCare" height="70">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

        </div>

        <div class="d-flex">
            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="fa fa-search"></span>
                </div>
            </form>

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            @if (Auth::user())
            <div class="dropdown d-inline-block">
                @if (Auth::user()->idroles==2)
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="badge bg-danger rounded-pill">
                        @foreach (App\User::where('idroles', 2)->get() as $medicos)
                        @if(Auth::user()->id==$medicos->id)
                        {{App\AtencionMedica::where(['idmedico' => $medicos->id, 'confirmado' => 1])->count()}}
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-16"> Notificationes
                                    {{App\AtencionMedica::where(['idmedico' => $medicos->id, 'confirmado' => 1])->count()}}
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-warning rounded-circle font-size-16">
                                            <i class="mdi mdi-message-text-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">New Message received</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                View all
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endif
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->imagen)
                    <img class="rounded-circle header-profile-user" src="{{ route('user.avatar', ['filename'=>Auth::user()->imagen]) }}" alt="Header Avatar">
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('user.profile', ['id'=>Auth::user()->id]) }}"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-cog-outline"></i>
                </button>
            </div>

            @else
            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <a href="/register"><button class="btn btn-success">Registrarse</button></a>
                </button>
            </div>
            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <a href="/login"><button class="btn btn-info">Iniciar sesión</button></a>
                </button>
            </div>
            @endif
        </div>
    </div>
</header>
