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

                                    {{-- <div class="">
                                        @if ($aboutImage->img != null)
                                            <img src="/aboutimage/{{ $aboutImage->img }}" class="w-10 m-auto" alt="">
                                        @else
                                            <p class="text-danger">No Data</p>
                                        @endif
                                    </div> --}}
                                </div>
                            </div>



                            <div class="row text-center my-3">
                                <div class="col-4">
                                    <label for="">
                                        Title
                                    </label>
                                    <p>
                                        {{ $about->title }}
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        Subtitle
                                    </label>
                                    <p>
                                        {{ $about->subtitle }}
                                    </p>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        Text
                                    </label>
                                    <p>
                                        {{ $about->text }}
                                    </p>
                                </div>
                            </div>

                            <div class="row text-center my-3">
                                <label class="text-lg">About Images </label>
                            </div>

                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr class="text-center">

                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                Image
                                            </th>



                                                <th class="text-secondary opacity-7"></th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($aboutImage as $data)
                                                <tr class="text-center">

                                                    <td>
                                                        <img src="/aboutimage/{{ $data->img }}" class="w-10 m-auto" alt="">
                                                    </td>





                                                    <td class="align-middle">
                                                        <a href="{{ url('admin/delete_about_img', $data->id) }}"
                                                            class="text-danger font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit about Image"
                                                            onclick="return confirm('Are you sure you want to delete this about Image?')">
                                                            Delete
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="16">
                                                        <p class="text-xs text-center text-danger font-weight-bold mb-0">
                                                            No Data !
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $aboutImage->render('admin.pagination') }}
                                </div>
                            </div>






                            <div class="row text-center my-3">
                                <label class="text-lg">About Point </label>

                            </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr class="text-center">

                                                    <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                    Image
                                                </th>

                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                Title
                                            </th>

                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                            Subtitle
                                        </th>

                                                    <th class="text-secondary opacity-7"></th>
                                                    <th class="text-secondary opacity-7"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($aboutPoint as $data)
                                                    <tr class="text-center">

                                                        <td>
                                                            <img src="/aboutpoint/{{ $data->img }}" async class="d-block m-auto" width="50px" alt="">
                                                        </td>

                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $data->title }}
                                                            </p>
                                                        </td>

                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $data->subtitle }}
                                                            </p>
                                                        </td>

                                                        <td class="align-middle">
                                                            @include('admin.subscriber.update_subscriber')
                                                          </td>

                                                        <td class="align-middle">
                                                            <a href="{{ url('admin/delete_about_point', $data->id) }}"
                                                                class="text-danger font-weight-bold text-xs"
                                                                data-toggle="tooltip" data-original-title="Edit about_point"
                                                                onclick="return confirm('Are you sure you want to delete this about_point?')">
                                                                Delete
                                                                <i class="bi bi-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="16">
                                                            <p class="text-xs text-center text-danger font-weight-bold mb-0">
                                                                No Data !
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $aboutPoint->render('admin.pagination') }}
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
