<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Welcome Back</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ Auth::user()->f_name }} !</h6>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <ul class="navbar-nav  justify-content-end">

                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        @if (session()->has('message'))
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast show bg-success text-white" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="toast-body">
                        <div class="d-flex justify-content-between">
                            <i class="fa-solid fa-check fs-5"></i>
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if (session()->has('error'))
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast show bg-danger text-white" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="toast-body">
                        <div class="d-flex justify-content-between">
                            <i class="fa-solid fa-circle-exclamation fs-5"></i>
                            {{ session()->get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>
</nav>
