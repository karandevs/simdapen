<!-- BEGIN: Sidebar -->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header mt-1 mb-5">
        <ul class="nav navbar-nav flex-row">
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand brand-logo">
                        <img src="img/Logobpn.png" alt="Bootstrap" width="70" height="70"
                            style="margin-left: 55px; margin-bottom: 5px">
                    </a>
                </div>
                <ul class="text-white" style="margin-left: 25px">
                    <strong class="fs-">KANTOR PERTANAHAN</strong>
                </ul>
                <ul class="text-white" style="margin-left: 57px">
                    <strong class="fs-">KOTA BOGOR</strong>
                </ul>
            </nav>
        </ul>
    </div>
    <br>
    <br>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center" href="/home"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Menu</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('pangkat-golongan.index') }}"><i
                        data-feather="database"></i><span class="menu-title text-truncate" data-i18n="Pktgol">Data
                        Pangkat & Golongan</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('jabatan.index') }}"><i
                        data-feather="database"></i><span class="menu-title text-truncate" data-i18n="Email">Data
                        Jabatan</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('pegawai.index') }}"><i
                        data-feather="database"></i><span class="menu-title text-truncate" data-i18n="Email">Data
                        Pegawai</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('pensiun.index') }}"><i
                        data-feather="layers"></i><span class="menu-title text-truncate" data-i18n="Email">Data
                        Pensiun</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Sidebar -->
