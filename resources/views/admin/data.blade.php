<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body class="g-sidenav-show bg-primary">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="{{ url('/admin/access') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row bg-light p-3 rounded rounded-3">
                <div class="col-12">

                    <div class="row">
                        <div class="col-6 fs-6 text-center mt-4">
                            Welcome to our system <span class="fw-bold fs-5">&nbsp; {{ Auth::user()->name }}</span> !
                            <p>Please fill this form below to access our control management system!</p>
                        </div>
                        <div class="col-6">
                            <img src="/images/logo.png" class="d-block m-auto w-50" alt="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-4">
                            <div class="">
                                <label for="">Logo</label>
                                <input class="form-control" type="file" name="logo">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="">
                                <label for="">Age Restriction</label>
                                <input class="form-control" type="number" name="age_rest"
                                    value="{{ Auth::user()->age_rest }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="">
                                <label for="">Delivery Price</label>
                                <input class="form-control" type="number" name="delivery"
                                    value="{{ Auth::user()->delivery }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex m-auto">
                                <button type="submit" class="d-flex m-auto mt-3 btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



    @include('admin.script')


</body>

</html>
