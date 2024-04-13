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

                        {{-- <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">

                                    @include('admin.order.add_order')

                                </div>
                            </div>
                        </div> --}}

                        {{-- Search --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="d-block w-50 m-auto">
                                    <form action="{{ url('/admin/search_user') }}" method="GET">
                                        @csrf
                                        <p for="" class="text-center form-label">Search Names, Emails or Phone
                                            Number
                                        </p>

                                        <div class="d-flex justify-content-center">

                                            <div class="input-group mb-3 w-75">

                                                <input type="text" name="text" class="form-control"
                                                    placeholder="example@gmail.com" style="height: 41px "
                                                    id="searchInput">



                                            </div>

                                        </div>

                                    </form>
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

                                                Confirmation
                                            </th>
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

                                                Registered
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

                                                Promo
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
                                            <th class="text-secondary opacity-7"></th>

                                        </tr>
                                    </thead>
                                    <tbody id="SearchResults">
                                        @forelse ($order as $data)
                                            <tr class="text-center">
                                                <td>
                                                    <div class="d-flex">
                                                        @if ($data->confirm === 0)
                                                            <form
                                                                action="{{ route('update-status', ['id' => $data->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" name="conf" value="0"
                                                                    class="btn btn-danger btn-sm" disabled>
                                                                    <i class="bi bi-x" style="font-size: 1rem;"></i>
                                                                </button>
                                                            </form>
                                                        @elseif ($data->confirm === 1)
                                                            <form
                                                                action="{{ route('update-status', ['id' => $data->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" name="conf" value="1"
                                                                    class="btn btn-success btn-sm me-1" disabled>
                                                                    <i class="bi bi-check" style="font-size: 1rem;"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('update-status', ['id' => $data->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" name="conf" value="1"
                                                                    class="btn btn-success btn-sm me-1">
                                                                    <i class="bi bi-check" style="font-size: 1rem;"></i>
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="{{ route('update-status', ['id' => $data->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" name="conf" value="0"
                                                                    class="btn btn-danger btn-sm">
                                                                    <i class="bi bi-x" style="font-size: 1rem;"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>


                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        #{{ $data->id }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($data->user_id)
                                                            @foreach ($users as $user)
                                                                @if ($user->id == $data->user_id)
                                                                    {{ $user->f_name }} {{ $user->l_name }}
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $data->f_name }} {{ $data->l_name }}
                                                            </p>
                                                        @endif
                                                    </p>
                                                </td>

                                                <td>
                                                    @if ($data->address !== null)
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
                                                    @if ($data->registered == 1)
                                                        <span
                                                            class="badge badge-sm bg-gradient-success ">Registered</span>
                                                    @else
                                                        <span class="badge badge-sm bg-gradient-danger ">Not
                                                            Registered</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($data->paid == 1)
                                                        <span class="badge badge-sm bg-gradient-success ">Paid</span>
                                                    @else
                                                        <span class="badge badge-sm bg-gradient-danger ">Not Paid</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($data->method == 1)
                                                        <span class="badge badge-sm bg-gradient-success">Cash</span>
                                                    @else
                                                        <span class="badge badge-sm bg-gradient-danger ">Points</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($data->delivered == 1)
                                                        <span
                                                            class="badge badge-sm bg-gradient-success ">Delivered</span>
                                                    @else
                                                        <span class="badge badge-sm bg-gradient-danger ">Not
                                                            Delivered</span>
                                                    @endif
                                                </td>



                                                <td>
                                                    @if ($data->promo != null)
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $data->promo }}
                                                        </p>
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
                                                    <a href="{{ url('admin/view_order', $data->id) }}"
                                                        class="text-primary font-weight-bold text-xs"
                                                        data-toggle="tooltip">
                                                        View
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </td>

                                                @php
                                                    $start_date = session('selected_date_range.0', 0);
                                                    $end_date = session('selected_date_range.1', 0);
                                                @endphp


                                                <td class="align-middle">
                                                    <a href="{{ url('admin/' . $start_date . '/' . $end_date . '/update_order/' . $data->id) }}"
                                                        class="text-success font-weight-bold text-xs"
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


    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var searchInput = $('#searchInput').val();

                $.ajax({
                    url: '{{ url('admin/search_order') }}',
                    type: 'GET',
                    data: {
                        query: searchInput,
                    },
                    success: function(response) {
                        var ordersHtml = '';
                        response.forEach(function(order) {
                            var confirmBtnsHtml = '';
                            if (order.confirm === 0) {
                                confirmBtnsHtml = `
                                    <form action="/update-status/${order.id}" method="POST">
                                        @csrf
                                        <button type="submit" name="conf" value="0" class="btn btn-danger btn-sm" disabled>
                                            <i class="bi bi-x" style="font-size: 1rem;"></i>
                                        </button>
                                    </form>`;
                            } else if (order.confirm === 1) {
                                confirmBtnsHtml = `
                                    <form action="/update-status/${order.id}" method="POST">
                                        @csrf
                                        <button type="submit" name="conf" value="1" class="btn btn-success btn-sm me-1" disabled>
                                            <i class="bi bi-check" style="font-size: 1rem;"></i>
                                        </button>
                                    </form>`;
                            } else {
                                confirmBtnsHtml = `
                                    <form action="/update-status/${order.id}" method="POST">
                                        @csrf
                                        <button type="submit" name="conf" value="1" class="btn btn-success btn-sm me-1">
                                            <i class="bi bi-check" style="font-size: 1rem;"></i>
                                        </button>
                                    </form>
                                    <form action="/update-status/${order.id}" method="POST">
                                        @csrf
                                        <button type="submit" name="conf" value="0" class="btn btn-danger btn-sm">
                                            <i class="bi bi-x" style="font-size: 1rem;"></i>
                                        </button>
                                    </form>`;
                            }

                            var addressIcon = order.address !== null ?
                                '<i class="fa fa-check text-success"></i>' :
                                '<i class="fa fa-times text-danger"></i>';
                            var registeredBadge = order.registered == 1 ?
                                '<span class="badge badge-sm bg-gradient-success">Registered</span>' :
                                '<span class="badge badge-sm bg-gradient-danger">Not Registered</span>';
                            var paidBadge = order.paid == 1 ?
                                '<span class="badge badge-sm bg-gradient-success">Paid</span>' :
                                '<span class="badge badge-sm bg-gradient-danger">Not Paid</span>';
                            var methodBadge = order.method == 1 ?
                                '<span class="badge badge-sm bg-gradient-success">Cash</span>' :
                                '<span class="badge badge-sm bg-gradient-danger">Points</span>';
                            var deliveredBadge = order.delivered == 1 ?
                                '<span class="badge badge-sm bg-gradient-success">Delivered</span>' :
                                '<span class="badge badge-sm bg-gradient-danger">Not Delivered</span>';

                            ordersHtml += `
                                <tr class="text-center">
                                    <td>
                                        <div class="d-flex">
                                            ${confirmBtnsHtml}
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            ${order.id}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            ${order.f_name} ${order.l_name}
                                        </p>
                                    </td>
                                    <td>
                                        ${addressIcon}
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            ${order.email}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            ${order.phone}
                                        </p>
                                    </td>
                                    <td>
                                        ${registeredBadge}
                                    </td>
                                    <td>
                                        ${paidBadge}
                                    </td>
                                    <td>
                                        ${methodBadge}
                                    </td>
                                    <td>
                                        ${deliveredBadge}
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            ${order.promo}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            ${order.total_pts}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            ${order.total_lbp}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            ${order.total_usd}
                                        </p>
                                    </td>
                                   <td class="align-middle">
                                        <a href="/admin/view_order/${order.id}" class="text-primary font-weight-bold text-xs" data-toggle="tooltip">
                                            View <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/admin/update_order/${order.id}" class="text-success font-weight-bold text-xs" data-toggle="tooltip">
                                            Update <i class="bi bi-pen"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/admin/delete_order/${order.id}" class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit order" onclick="return confirm('Are you sure you want to delete this order?')">
                                            Delete <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#SearchResults').html(ordersHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>


    @include('admin.script')

</body>

</html>
