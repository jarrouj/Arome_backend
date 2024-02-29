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
                            <h6>All Users</h6>
                        </div>

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="d-block w-50 m-auto">
                                    <form action="{{ url('/admin/search_user') }}" method="POST">
                                        @csrf
                                        <p for="" class="text-center form-label">Search Names, Emails or Phone
                                            Number
                                        </p>

                                        <div class="d-flex justify-content-center">

                                            <div class="input-group mb-3 w-75">

                                                <input type="text" name="text" class="form-control"
                                                    placeholder="example@gmail.com" style="height: 41px ">

                                                <button class="btn btn-dark" type="submit">
                                                    <i class="bi bi-search"></i>
                                                </button>

                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div> --}}

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Full Name/Email
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Role
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status
                                            </th>
                                            <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Address
                                        </th>
                                        <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Points
                                    </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                First Visit
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Last Seen
                                            </th>

                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user as $data)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $data->f_name }} {{ $data->l_name }}</h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $data->email }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($data->usertype == 1)
                                                            <span
                                                                class="badge badge-sm bg-gradient-success">Admin</span>
                                                        @else
                                                            <span
                                                                class="badge badge-sm bg-gradient-secondary">Customer</span>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if (Cache::has('user-is-online-' . $data->id))
                                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                                    @else
                                                        <span class="text-secondary">Offline</span>
                                                    @endif
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $data->address }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $data->points }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $data->created_at }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $data->last_seen }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ url('admin/update_user', $data->id) }}"
                                                        class="text-success font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit <i class="bi bi-pencil"></i>
                                                    </a>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ url('admin/delete_user', $data->id) }}"
                                                        class="text-danger font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user"
                                                        onclick="return confirm('Are you sure you want to delete this User?')">
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
                                {{ $user->render('admin.pagination') }}
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
