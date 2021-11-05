<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="nav-item {{ (request()->is('atenciones')) ? 'active' : '' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-clipboard-list"></i> 
                            <span>Atenciones médicas</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li class="{{ (request()->is('medicos')) ? 'active' : '' }}">
                                <a href="/medicos"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Ver médicos</span></a> </li>
                            @if(Auth::check() && Auth::user()->idroles == 3)
                            <li class="{{ (request()->is('crear-medico')) ? 'active' : '' }}">
                                <a href="/crear-medico"><i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="eCommerce">Crear médico</span></a> </li>
                            @endif
                        </ul>
                </li>
                <li class="nav-item {{ (request()->is('centros-salud') ? 'has-sub sidebar-group-active open' : '' )}}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-ambulance"></i>
                        <span>Centros de Salud</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ (request()->is('centros-salud')) ? 'active' : '' }}">
                            <a href="/centros-salud"><i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="Analytics">Ver centros de salud</span></a></li>
                        @if(Auth::check() && Auth::user()->idroles == 3)
                        <li class="{{ (request()->is('crear-centro-salud')) ? 'active' : '' }}">
                            <a href="/crear-centro-salud"><i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="eCommerce">Crear centro de salud</span></a></li>
                        @endif
                    </ul>
                </li>
                @auth
                <li class="nav-item {{ (request()->is('atenciones')) ? 'active' : '' }}"><a href="{{ route('atencion.index') }}">
                        <a href="{{ route('atencion.index') }}" class="waves-effect">
                            <i class="fas fa-clipboard-check"></i><span class="badge rounded-pill bg-primary float-end">
                                {{App\AtencionMedica::where(['idusuario' => Auth::user()->id])->count()}}
                            </span>
                            <span>Atenciones médicas</span>
                        </a>
                </li>
                @endauth
            </ul>
            </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
