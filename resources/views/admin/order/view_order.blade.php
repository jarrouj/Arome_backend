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
                        <div class="card-header pb-0 ">
                            <a href="{{ url('/admin/show_order') }}" class="btn btn-dark">
                                <i class="bi bi-arrow-left"></i>
                                back
                            </a>
                            <h6>View Order</h6>
                        </div>
                        <div class="card-body px-auto pt-0 pb-2">

                            <div class="mt-4 row">
                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->f_name }} {{ $order->l_name}}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->email }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->phone }}</p>
                                    </div>
                                </div>


                            </div>


                        </div>

                        <div class="mt-4 row justify-content-center">
                            <div class="col-4"></div>
                            <div class="col-4 col-md-2">
                                <div class="mb-3 text-center">
                                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                                    <p class="text-xs font-weight-bold mb-0">{{ $order->address }}</p>
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>


                        <div class="card-body px-auto pt-0 pb-2">

                            <div class="mt-4 row">
                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Paid</label>
                                        <p class=" font-weight-bold mb-0">
                                            @if($order->paid == 1)
                                            <span class="badge badge-sm bg-gradient-success ">Paid</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger ">Not Paid</span>
                                            @endif
                                         </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Method</label>
                                        <p class=" font-weight-bold mb-0">
                                            @if($order->method == 1)
                                            <span class="badge badge-sm bg-gradient-success ">Cash</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-success ">Points</span>
                                            @endif
                                         </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Delivered</label>
                                        <p class=" font-weight-bold mb-0">
                                            @if($order->delivered == 1)
                                            <span class="badge badge-sm bg-gradient-success ">Delivered</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger ">Not Delivered</span>
                                            @endif
                                         </p>
                                    </div>
                                </div>



                            </div>


                        </div>



                        <div class="card-body px-auto pt-0 pb-2">

                            <div class="mt-4 row">
                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Registered</label>
                                        <p class=" font-weight-bold mb-0">
                                            @if($order->registered == 1)
                                            <span class="badge badge-sm bg-gradient-success ">Registered</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger ">Not Registered</span>
                                            @endif
                                         </p>
                                        </div>
                                </div>

                                <div class="col-md-4">
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Offer</label>
                                        <p class=" font-weight-bold mb-0">
                                            @if($order->offer == 1)
                                            <span class="badge badge-sm bg-gradient-success ">Offer</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger ">Not Offer</span>
                                            @endif
                                         </p>                                    </div>
                                </div>



                            </div>


                        </div>



                        <div class="card-body px-auto pt-0 pb-2">

                            <div class="mt-4 row">
                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Total (LBP)</label>
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->total_lbp }} </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Total (USD)</label>
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->total_usd }} </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Total (Points)</label>
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->total_pts }} </p>
                                    </div>
                                </div>



                            </div>


                        </div>


                            {{-- Images --}}
                            <div class="mt-4 row">

                                <div class="col-12">
                                    <label for="exampleInputPassword1" class="form-label">
                                       Products
                                    </label>

                                    <div class="mb-3">
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

                                                            Product Name
                                                        </th>


                                                        <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                        Size
                                                        </th>
                                                        <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                        Quantity
                                                        </th>



                                                            <th class="text-secondary opacity-7"></th>
                                                            <th class="text-secondary opacity-7"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($productImages as $data)
                                                            <tr class="text-center">

                                                                <td>
                                                                    @foreach ($data['productImages'] as $productImage)
                                                                        <img src="/productimage/{{ $productImage->img }}" width="100px" />
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    <p class="text-xs font-weight-bold mb-0">
                                                                        {{ $data['orderProduct']->product_id }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-xs font-weight-bold mb-0">
                                                                        {{ $data['orderProduct']->size_id }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-xs font-weight-bold mb-0">
                                                                        {{ $data['orderProduct']->qty }}
                                                                    </p>
                                                                </td>


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
                                                {{-- {{ $productImage->render('admin.pagination') }} --}}
                                            </div>
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
