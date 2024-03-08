<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body class="g-sidenav-show bg-gray-100">

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
                            <h6>Offers</h6>
                        </div>

                        <a href="{{ url('/admin/add_offer') }}" class="btn btn-dark w-10 mx-auto">
                            <i class="me-2 fs-6 bi bi-plus-lg"></i>
                            Add
                        </a>


                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr class="text-center">

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Image
                                            </th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Offer Name
                                            </th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Price
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Active
                                            </th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($offer as $data)
                                            @if ($loop->first || $data->name != $offer[$loop->index - 1]->name)
                                                <tr class="text-center">
                                                    <td>
                                                        <img src="/offer/{{ $data->img }}" async class="d-block m-auto" width="100px" alt="">

                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $data->name }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $data->price }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $data->active }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ url('admin/delete_offer', $data->id) }}"
                                                            class="text-danger font-weight-bold text-xs"
                                                            data-toggle="tooltip"
                                                            data-original-title="Edit offer"
                                                            onclick="return confirm('Are you sure you want to delete this offer?')">
                                                            Delete
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
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
                                {{ $offer->render('admin.pagination') }}
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
