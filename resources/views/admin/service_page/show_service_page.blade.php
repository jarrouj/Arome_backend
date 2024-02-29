<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body class="g-sidenav-show   bg-gray-100">

    @include('admin.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Service Page</h6>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">

                                    @include('admin.service_page.update_service_page')

                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 pt-0 mt-4 pb-2">

                            <div class="row text-center my-3">
                                <div class="col-3">
                                    <label for="">
                                        Image 1
                                    </label>
                                    <img src="/service_page/{{ $service_page->img1 }}" async class="d-block m-auto" width="50px" alt="">


                                </div>
                                <div class="col-3">
                                    <label for="">
                                        Image 2
                                    </label>
                                    <img src="/service_page/{{ $service_page->img2 }}" async class="d-block m-auto" width="50px" alt="">

                                </div>
                                <div class="col-3">
                                    <label for="">
                                        Image 3
                                    </label>
                                    <img src="/service_page/{{ $service_page->img3 }}" async class="d-block m-auto" width="50px" alt="">

                                </div>

                                <div class="col-3">
                                    <label for="">
                                        Image 4
                                    </label>
                                    <p>
                                        <img src="/service_page/{{ $service_page->img4 }}" async class="d-block m-auto" width="50px" alt="">
                                    </p>
                                </div>
                            </div>

                            <div class="row text-center my-3">

                                <div class="col-6">
                                    <label for="">
                                        <img src="/images/en.png" width="15px" alt="">

                                        Title
                                    </label>
                                    <p>
                                        {{ $service_page->titleen }}
                                    </p>
                                </div>

                                <div class="col-6">
                                    <label for="">
                                        <img src="/images/ar.png" width="15px" alt="">

                                        Title
                                    </label>
                                    <p>
                                        {{ $service_page->titlear }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>

    @include('admin.script')

</body>

</html>
