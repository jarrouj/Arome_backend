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
                            <h6>Orders</h6>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">

                                    @include('admin.order.add_order')

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

                                            Order ID
                                        </th>

                                            <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    User
                                </th>


                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                            Address
                                        </th>

                                        <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                        Email
                                    </th>

                                    <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Phone
                                </th>


                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Paid
                                </th>

                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Method
                                </th>

                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Delivered
                                </th>

                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Offer
                                </th>

                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Total Points
                                </th>

                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Total (LBP)
                                </th>

                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Total (USD)
                                </th>
                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order as $data)
                                            <tr class="text-center">

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->id }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @foreach ($users as $user)
                                                        @if ($user->id == $data->user_id)
                                                        {{ $user->f_name}} {{ $user->l_name}}

                                                        @endif
                                                        @endforeach

                                                    </p>
                                                </td>

                                                <td>
                                                    @if ($data->address !== null )
                                                        <i class="fa fa-check text-success"></i>
                                                    @else
                                                        <i class="fa fa-times text-danger"></i>
                                                    @endif
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->email }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->phone }}
                                                    </p>
                                                </td>

                                                <td>
                                                    @if($data->paid == 1)
                                                    <span class="badge badge-sm bg-gradient-success ">Paid</span>
                                                    @else
                                                    <span class="badge badge-sm bg-gradient-danger ">Not Paid</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($data->method == 1)
                                                    <span class="badge badge-sm bg-gradient-success">Cash</span>
                                                    {{-- @else
                                                    <span class="badge badge-sm bg-gradient-danger ">Not Active</span> --}}
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($data->delivered == 1)
                                                    <span class="badge badge-sm bg-gradient-success ">Delivered</span>
                                                    @else
                                                    <span class="badge badge-sm bg-gradient-danger ">Not Delivered</span>
                                                    @endif
                                                </td>



                                                <td>
                                                    @if ($data->offer == 1)
                                                        <i class="fa fa-check text-success"></i>
                                                    @else
                                                        <i class="fa fa-times text-danger"></i>
                                                    @endif
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->total_pts }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->total_lbp }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->total_usd }}
                                                    </p>
                                                </td>

                                                <td class="align-middle">
                                                    <a href="{{ url('admin/update_order', $data->id) }}"
                                                        class="text-primary font-weight-bold text-xs"
                                                        data-toggle="tooltip">
                                                        Update
                                                        <i class="bi bi-pen"></i>
                                                    </a>
                                                </td>

                                                <td class="align-middle">
                                                    <a href="{{ url('admin/delete_order', $data->id) }}"
                                                        class="text-danger font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit order"
                                                        onclick="return confirm('Are you sure you want to delete this order?')">
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
                                {{ $order->render('admin.pagination') }}
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
