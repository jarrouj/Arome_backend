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
                            <h6>Partners</h6>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">

                                    @include('admin.partner.add_partner')

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
                                                Logo
                                            </th>
                                            {{-- <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Url
                                            </th> --}}
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Created At
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($partner as $data)
                                            <tr class="text-center">
                                                <td class="bg-primary">
                                                    <img src="/partner/{{ $data->logo }}" async class="d-block m-auto"
                                                        width="50px" alt="">
                                                </td>
                                                {{-- <td>
                                                    @if ($data->url != null)
                                                        <a href="{{ $data->url }}"
                                                            class="text-decoration-none text-primary">
                                                            url
                                                            <i class="bi bi-box-arrow-up-right"></i>
                                                        </a>
                                                    @else
                                                        <i class="bi bi-x-lg text-danger fs-3"></i>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->created_at }}
                                                    </p>
                                                </td>
                                                {{-- <td class="align-middle">
                                                    <a href="{{ url('admin/update_partner', $data->id) }}"
                                                        class="text-primary font-weight-bold text-xs">
                                                        Edit
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                </td> --}}
                                                <td class="align-middle">
                                                    <a href="{{ url('admin/delete_partner', $data->id) }}"
                                                        class="text-danger font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit partner"
                                                        onclick="return confirm('Are you sure you want to delete this partner?')">
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
                                {{ $partner->render('admin.pagination') }}
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
