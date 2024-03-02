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
                            <h6>Promos</h6>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">

                                    @include('admin.promo.add_promo')

                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr class="text-center">

                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                            Name
                                        </th>

                                        <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                        Promo
                                    </th>

                                    <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Discount
                                </th>

                                <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                Active
                            </th>

                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($promo as $data)
                                            <tr class="text-center">

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->name }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->promo }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->discount }}
                                                    </p>
                                                </td>

                                                <td>
                                                    @if($data->active == 1)
                                                    <span class="badge badge-sm bg-gradient-success w-30">Active</span>
                                                    @else
                                                    <span class="badge badge-sm bg-gradient-danger w-30">Not Active</span>
                                                    @endif
                                                </td>




                                                <td class="align-middle">
                                                    @include('admin.promo.update_promo')
                                                  </td>

                                                <td class="align-middle">
                                                    <a href="{{ url('admin/delete_promo', $data->id) }}"
                                                        class="text-danger font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit promo"
                                                        onclick="return confirm('Are you sure you want to delete this promo?')">
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
                                {{ $promo->render('admin.pagination') }}
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
