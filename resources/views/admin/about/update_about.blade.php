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

                        <a href="{{ url('/admin/show_about') }}" class="btn btn-dark w-10 ms-4">
                            <i class="bi bi-arrow-left"></i>
                            Back
                        </a>

                        <div class="card-body px-0 pt-0 pb-2">

                            <form action="{{ url('/admin/update_about_confirm', $about->id) }}" method="POST"
                                enctype="multipart/form-data" class="mx-3">
                                @csrf
                                <div class="row text-center">
                                    <div class="col-12">
                                        <label for="">
                                            Image
                                            <span class="text-danger fw-light text-sm">
                                                **1900px Width & 1268px Height**
                                            </span>
                                        </label>

                                        <div class="">
                                            @if ($aboutImage->img == null)
                                                <p class="text-danger">No Data</p>
                                            @else
                                                <img src="/aboutimage/{{ $aboutImage->img }}" class="w-25 m-auto"
                                                    alt="">
                                            @endif
                                        </div>

                                        <input type="file" class="form-control w-25 m-auto"
                                            value="{{ $aboutImage->img }}" name="img" >
                                    </div>
                                </div>

                                <div class="row text-center my-3">
                                    <div class="col-4">
                                        <label for="">
                                            <img src="/images/en.png" width="15px" alt="">
                                            Title
                                        </label>
                                        <input required name="title" id="" class="p-3 form-control"  value="{{$about->title}}" />
                                    </div>
                                    <div class="col-4">
                                        <label for="">
                                            Subtitle
                                        </label>
                                        <input required name="subtitle" id="" class="p-3 form-control"  value=" {{$about->subtitle}} " />
                                    </div>
                                    <div class="col-4">
                                        <label for="">
                                            Text
                                        </label>
                                        <textarea required name="text" id="" class="p-3 form-control" cols="5" rows="2" >{{ $about->text }}</textarea>
                                    </div>
                                </div>




                                <div class="row text-center my-3">
                                    <label class="text-lg">About Point </label>
                                    <div class="col-6">
                                        <label for="">
                                            Title
                                        </label>
                                        <input required name="titlepoint" id="" class="p-3 form-control"  value="{{$aboutPoint->title}}" />
                                    </div>
                                    <div class="col-6">
                                        <label for="">
                                            Subtitle
                                        </label>
                                        <input required name="subtitlepoint" id="" class="p-3 form-control"  value="{{$aboutPoint->subtitle}}" />
                                    </div>


                                </div>

                                <div class="row text-center">
                                    <div class="col-12">
                                        <label for="">
                                            Image
                                            <span class="text-danger fw-light text-sm">
                                                **1900px Width & 1268px Height**
                                            </span>
                                        </label>

                                        <div class="">
                                            @if ($aboutPoint->img == null)
                                                <p class="text-danger">No Data</p>
                                            @else
                                                <img src="/aboutpoint/{{ $aboutPoint->img }}" class="w-25 m-auto"
                                                    alt="">
                                            @endif
                                        </div>

                                        <input type="file" class="form-control w-25 m-auto"
                                            value="{{ $aboutPoint->img }}" name="imgpoint" >
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <button class="d-block m-auto btn btn-dark w-10 text-center"
                                            type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>

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
