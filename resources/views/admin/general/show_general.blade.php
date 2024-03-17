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
                            <h6>General Section</h6>
                        </div>

                        <a href="{{ url('/admin/update_general', $general->id) }}" class="btn btn-dark w-10 mx-auto">
                            <i class="bi bi-pencil"></i>
                            Update
                        </a>



                            <div class="row text-center my-3">
                                <div class="col-4">
                                    <label for="">
                                        Api
                                    </label>
                                    <p>
                                        {{ $general->api }}
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        Info Guide
                                    </label>
                                    <p>
                                        {{ $general->info_guide }}
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        New User
                                    </label>
                                    <p>
                                        {{ $general->new_user }}
                                    </p>
                                </div>
                            </div>




                            <div class="row text-center my-3">
                                <div class="col-4">
                                    <label for="">
                                       Shipping Cost
                                    </label>
                                    <p>
                                        {{ $general->shipping_cost }}
                                    </p>
                                </div>

                                <div class="col-4">
                                    <label for="">
                                       Shipping Text
                                    </label>
                                    <p>
                                        {{ $general->shipping_text }}
                                    </p>
                                </div>

                                <div class="col-4">
                                    <label for="">
                                      Additional Info
                                    </label>
                                    <p>
                                        {{ $general->additional_info }}
                                    </p>
                                </div>


                            </div>

                            <div class="row text-center my-3">
                                <div class="col-4">
                                    <label for="">
                                       Subscriber Discount
                                    </label>
                                    <p>
                                        {{ $general->subscriber_discount }}
                                    </p>
                                </div>

                                <div class="col-4">
                                    <label for="">
                                       Pixel
                                    </label>
                                    <p>
                                        {{ $general->pixel }}
                                    </p>
                                </div>

                                <div class="col-4">
                                    <label for="">
                                      Meta Script
                                    </label>
                                    <p>
                                        {{ $general->meta_script }}
                                    </p>
                                </div>


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
