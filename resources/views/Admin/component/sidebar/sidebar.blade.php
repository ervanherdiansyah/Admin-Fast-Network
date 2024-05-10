<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('argon') }}/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">{{ Auth::user()->name }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ url('/admin/dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Information Parfum</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/admin/management-user') ? 'active' : '' }}"
                    href="{{ url('/admin/management-user') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users text-warning text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Management User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/paket') ? 'active' : '' }}" href="{{ url('/admin/paket') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-book text-info text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Paket</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/product') ? 'active' : '' }}"
                    href="{{ url('/admin/product/') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-book text-success text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/courier') ? 'active' : '' }}"
                    href="{{ url('/admin/courier') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-book text-danger text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Courier</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/reward') ? 'active' : '' }}"
                    href="{{ url('/admin/reward') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-calendar-check-o text-info text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Reward</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/order') ? 'active' : '' }}"
                    href="{{ url('/admin/order') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-calendar-check-o text-info text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Order</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/mitra') ? 'active' : '' }}"
                    href="{{ url('/admin/mitra') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-calendar-check-o text-info text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mitra</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/withdraw-balance') ? 'active' : '' }}"
                    href="{{ url('/admin/withdraw-balance') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-calendar-check-o text-info text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Withdraw Balance</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/withdraw-point') ? 'active' : '' }}"
                    href="{{ url('/admin/withdraw-point') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-calendar-check-o text-info text-sm opacity-10" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Withdraw Point</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="{{ asset('argon') }}/assets/img/illustrations/icon-documentation.svg"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="{{ url('/dashboard/profile') }}" class="btn btn-dark btn-sm w-100 mb-3">Profile</a>
        <a class="btn btn-primary btn-sm mb-0 w-100" href="{{ url('/dashboard/changepassword') }}"
            type="button">Change
            Password</a>
    </div>
</aside>
