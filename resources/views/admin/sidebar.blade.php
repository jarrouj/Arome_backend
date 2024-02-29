<div class="min-height-300 bg-dark position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header mb-3">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="" href="{{ url('/') }}">
            <img src="/images/logo.png" width="200px" class="d-block mx-auto p-3" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_user' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_user') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-users text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_hero' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_hero') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-house-door-fill text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Home Page</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_process' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_process') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-clipboard-data-fill text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Process</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_strategy' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_strategy') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-info-circle text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Strategy</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_category' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_category') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-bookmarks-fill text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_service' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_service') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="bi bi-collection text-danger text-sm opacity-10"></i> --}}
                        <i class="bi bi-motherboard-fill text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Services</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_service_page' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_service_page') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="bi bi-collection text-danger text-sm opacity-10"></i> --}}
                        <i class="bi bi-motherboard-fill text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Service Page</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_info' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_info') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="bi bi-collection text-danger text-sm opacity-10"></i> --}}
                        <i class="bi bi-info-circle text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Info</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_description' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_description') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-card-text text-secondary-emphasis text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">Description</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_project' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_project') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-kanban-fill text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Project</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_service_slider' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_service_slider') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-sliders2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Services Slider</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_testimonial' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_testimonial') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="bi bi-collection text-danger text-sm opacity-10"></i> --}}
                        <i class="bi bi-motherboard-fill text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Testimonial</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_partner' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_partner') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="bi bi-collection text-danger text-sm opacity-10"></i> --}}
                        <i class="bi bi-people-fill text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Partners</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_customer' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_customer') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-fill text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Customer</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_pop' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_pop') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-bullseye text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pop</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_social' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_social') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-share fs-6 text-sm opacity-10" style="color:rgb(47, 194, 182)"></i>
                    </div>
                    <span class="nav-link-text ms-1">Social Media</span>
                </a>
            </li>

        </ul>
    </div>

    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <p class="text-xs font-weight-bold mt-2 mb-5">
                        <i class="bi bi-arrow-down"></i>
                        Scroll down for more
                        <i class="bi bi-arrow-down"></i>
                    </p>
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Don't hesitate to contact us</p>
                </div>
            </div>
        </div>
        <a href="" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">
            <i class="bi bi-telephone fs-6 me-1"></i>
            Call
        </a>
    </div>
</aside>
