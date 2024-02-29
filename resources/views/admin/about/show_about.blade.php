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
                            <h6>About Section</h6>
                        </div>

                        <a href="{{ url('/admin/update_about', $about->id) }}" class="btn btn-dark w-10 mx-auto">
                            <i class="bi bi-pencil"></i>
                            Update
                        </a>

                        <div class="card-body px-0 pt-0 mt-4 pb-2">
                            <div class="row text-center">
                                <div class="col-12">
                                    <label for="">
                                        Image
                                        <span class="text-danger fw-light text-sm">
                                            **1900px Width & 1268px Height**
                                        </span>
                                    </label>

                                    <div class="">
                                        @if ($about->image != null)
                                            <img src="/about/{{ $about->image }}" class="w-25 m-auto" alt="">
                                        @else
                                            <p class="text-danger">No Data</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row text-center my-3">
                                <div class="col-4">
                                    <label for="">
                                        <img src="/images/en.png" width="15px" alt="">
                                        Title
                                    </label>
                                    <p>
                                        {{ $about->title }}
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <img src="/images/fr.png" width="15px" alt="">
                                        Title1
                                    </label>
                                    <p>
                                        {{ $about->title1 }}
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <img src="/images/ar.png" width="15px" alt="">
                                        Title2
                                    </label>
                                    <p>
                                        {{ $about->title2 }}
                                    </p>
                                </div>
                            </div>


                            <div class="row text-center">
                                <div class="col-12">
                                    {{-- <label for="">
                                        History Image
                                        <span class="text-danger fw-light text-sm">
                                            **1900px Width & 1268px Height**
                                        </span>
                                    </label> --}}
{{--
                                    <div class="">
                                        @if ($about->himage != null)
                                            <img src="/about/{{ $about->himage }}" class="w-25 m-auto" alt="">
                                        @else
                                            <p class="text-danger">No Data</p>
                                        @endif
                                    </div> --}}
                                </div>
                            </div>

                            <div class="row text-center my-3">
                                <div class="col-4">
                                    <label for="">
                                        <img src="/images/en.png" width="15px" alt="">
                                       Text1
                                    </label>
                                    <p>
                                        {{ $about->text1 }}
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <img src="/images/fr.png" width="15px" alt="">
                                      Text2
                                    </label>
                                    <p>
                                        {{ $about->text2 }}
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <img src="/images/ar.png" width="15px" alt="">
                                        Subtitle 1
                                    </label>
                                    <p>
                                        {{ $about->subtitle1 }}
                                    </p>
                                </div>
                              <div class="row">
                                <div class="col-12 my-4 mx-4">
                                    <label for="">
                                        <img src="/images/ar.png" width="15px" alt="">
                                        Subtitle 2
                                    </label>
                                    <p>
                                        {{ $about->subtitle2 }}
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
