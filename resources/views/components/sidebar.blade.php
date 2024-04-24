<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <h3><b> Florateria</b></h3>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav" class="mt-2">

                <li class="sidebar-item mb-2">
                    <a class="sidebar-link {{ request()->is('index*') ? 'active' : '' }}" href="{{ route('index') }}"
                        aria-expanded="false">
                        <span>
                            <i class='bx bxs-dashboard'></i>
                        </span>
                        <span class="hide-menu">Dashboard {{ session('role') }} </span>
                    </a>
                </li>
                @if (session('role') == 'admin')
                    <li class="sidebar-item mb-2">
                        <a class="sidebar-link {{ request()->is('data-member*') ? 'active' : '' }}"
                            href="{{ route('data-member') }}" aria-expanded="false">
                            <span>
                                <i class='bx bxs-dashboard'></i>
                            </span>
                            <span class="hide-menu">Data Member</span>
                        </a>
                    </li>
                @endif



            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
