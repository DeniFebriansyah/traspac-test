<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <h3 class="sidebar-brand-full" href="">Sistem Pegawai</h3>
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark"
            aria-label="Close"
            onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav simplebar-scrollable-y" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: -8px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                        style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 8px;">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">
                                    <i class="fa-duotone fa-solid fa-house me-3"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-title">Master Data</li>
                            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                                    <div class="nav-icon">
                                        <i class="fa-duotone fa-user me-3"></i>
                                    </div>
                                    <span data-coreui-i18n="Pegawai">Pegawai</span>
                                </a>
                                <ul class="nav-group-items compact">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('pegawai') }}"><span
                                                class="nav-icon"><span class="nav-icon-bullet"></span></span><span
                                                data-coreui-i18n="Lihat Pegawai">Lihat Pegawai</span></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('add-pegawai') }}"><span
                                                class="nav-icon"><span class="nav-icon-bullet"></span></span>
                                            Tambah Data Pegawai</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('cari-pegawai') }}"><span
                                                class="nav-icon"><span class="nav-icon-bullet"></span></span>Cari Data
                                            Pegawai</a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 255px; height: 823px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                style="height: 101px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </ul>
</div>
