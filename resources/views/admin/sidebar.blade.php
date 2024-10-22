<div class="min-height-300 bg-dark position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header mb-3">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="" href="{{ url('/') }}">
            <img src="/logo/codergize.svg" width="250px" class="d-block mx-auto p-3" alt="main_logo">
        </a>

    </div>



    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <form action="{{ route('clear_session') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">
                <i class="bi bi-arrow-clockwise bi-sm"></i>
            </button>
        </form>

        <form action="{{ route('filter_date') }}" method="GET" id="dateForm">
            @csrf
            <div class="input-group mb-3 w-90 ms-2">
                <span class="input-group-text">From:</span>
                <input type="date" class="form-control" id="from_date" name="start_date" value="{{session('selected_date_range.0') ?? Date('Y-m-d')}}">
            </div>
            {{-- @php
                echo Date('m-d-Y');
            @endphp --}}
            <div class="input-group mb-3 w-90 ms-2">
                <span class="input-group-text">To:</span>
                <input type="date" class="form-control"  id="to_date" name="end_date" value="{{ session('selected_date_range.1') ?? Date('Y-m-d') }}">
            </div>
        </form>


        @php
        $start_date = session('selected_date_range.0', 0);
        $end_date = session('selected_date_range.1', 0);

        // Check if session values are 0
        if ($start_date == 0 || $end_date == 0) {
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d');
        }
    @endphp





        <ul class="navbar-nav">

            {{-- <a class="nav-link rounded-3 "
            href="{{ url('/admin', ['start_date' => $start_date, 'end_date' => $end_date]) }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a> --}}

            <li class="nav-item">
                <a class="nav-link rounded-3 "
                    href="{{ url('/admin', ['start_date' => $start_date, 'end_date' => $end_date]) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
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

            {{-- DropDown Website Content --}}
            <div class="dropdown  ms-3 rounded">
                <div class="w-100 mb-3 dropdown-toggle fw-bold pt-2" id="websiteContentDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Website Content
                </div>
                <!-- Dropdown menu for Website Content -->
                <div class="collapse " id="websiteContentCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link rounded-3 {{ 'admin/show_landing' == request()->path() ? 'main-color' : '' }}"
                                href="{{ url('/admin/show_landing') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-house-door-fill text-primary text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1 ">Home Page</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link rounded-3 {{ 'admin/show_about' == request()->path() ? 'main-color' : '' }}"
                                href="{{ url('/admin/show_about') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-info-circle text-primary text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">About</span>
                            </a>
                        </li>





                        <li class="nav-item">
                            <a class="nav-link rounded-3 {{ 'admin/show_term' == request()->path() ? 'main-color' : '' }}"
                                href="{{ url('/admin/show_term') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-kanban-fill text-success text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Term</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link rounded-3 {{ 'admin/show_privacy' == request()->path() ? 'main-color' : '' }}"
                                href="{{ url('/admin/show_privacy') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-lock-fill text-success text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Privacy</span>
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
            </div>
            {{-- Drop Down End --}}


            {{-- DropDown Marketing --}}
            <div class="dropdown  ms-3 rounded mt-2">
                <div class="w-100 mb-3 dropdown-toggle fw-bold  pt-2" id="marketingDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Marketing
                </div>
                <!-- Dropdown menu for Marketing -->
                <div class="collapse " id="marketingCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link rounded-3 {{ 'admin/show_promo' == request()->path() ? 'main-color' : '' }}"
                                href="{{ url('/admin/show_promo') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    {{-- <i class="bi bi-collection text-danger text-sm opacity-10"></i> --}}
                                    <i class="bi bi-bag-check-fill text-danger text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Promo</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link rounded-3 {{ 'admin/show_offer' == request()->path() ? 'main-color' : '' }}"
                                href="{{ url('/admin/show_offer') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bookmark-star-fill text-success text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Offer</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Drop Down End --}}


            {{-- DropDown Product Content --}}
            <div class="dropdown ms-3  rounded mt-2">
                <div class="w-100 mb-3 dropdown-toggle fw-bold  pt-2" id="productDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Product Content
                </div>
                <!-- Dropdown menu for product -->
                <div class="collapse" id="productCollapse">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link rounded-3 {{ 'admin/show_collection' == request()->path() ? 'main-color' : '' }}"
                                href="{{ url('/admin/show_collection') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-archive-fill text-success text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Collections</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link rounded-3 {{ 'admin/show_category' == request()->path() ? 'main-color' : '' }}"
                                href="{{ url('/admin/show_category') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-boxes text-primary text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Category</span>
                            </a>
                        </li>





                        <li class="nav-item">
                            <a class="nav-link rounded-3 {{ 'admin/show_product' == request()->path() ? 'main-color' : '' }}"
                                href="{{ url('/admin/show_product') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    {{-- <i class="bi bi-collection text-danger text-sm opacity-10"></i> --}}
                                    <i class="bi bi-box-seam-fill text-danger text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Products</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            {{-- Drop Down End --}}



            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_order' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_order') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-bag-fill text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Order</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_transaction' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_transaction') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-exchange text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Transaction</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_tag' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_tag') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-tag-fill text-secondary-emphasis text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">Tag</span>
                </a>
            </li>





            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_subscriber' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_subscriber') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-people-fill text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Subscriber</span>
                </a>
            </li>

              {{-- DropDown --}}
              <div class="dropdown  ms-3 rounded mt-2">
                <div class="w-100 mb-3 dropdown-toggle fw-bold  pt-2" id="settingDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Settings
                </div>
                <!-- Dropdown menu for setting -->
                <div class="collapse " id="settingCollapse">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link rounded-3 {{ 'admin/show_general' == request()->path() ? 'main-color' : '' }}"
                                href="{{ url('/admin/show_general') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-sliders text-primary text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">General</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
            {{-- Drop Down End --}}




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
