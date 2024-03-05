


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
                            <h6>Edit Order</h6>
                        </div>
                        <div class="card-body px-auto pt-0 pb-2">
                            <form action="{{ url('/admin/update_order_confirm', $order->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-4 row">
                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            User
                                        </label>
                                        <div>
                                            <div class="mb-3">
                                                <select id="userSelect" class="form-select" name="user_id">
                                                    <option value="" disabled selected>Select a User</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}" {{ $user->id == $order->user_id ? 'selected' : '' }}>{{ $user->f_name }} {{$user->l_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Paid
                                        </label>
                                        <div class="mb-3">
                                            <select id="paidSelect" class="form-select" name="paid" required>
                                                <option value="1" {{ $order->paid == 1 ? 'selected' : '' }}>Paid</option>
                                                <option value="0" {{ $order->paid == 0 ? 'selected' : '' }}>Not Paid</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Method
                                        </label>
                                        <div class="mb-3">
                                            <select id="methodSelect" class="form-select" name="method" required>
                                                <option value="1" selected>Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="mt-4 row">
                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Delivered
                                        </label>
                                        <div>
                                            <div class="mb-3">
                                                <select id="deliveredSelect" class="form-select" name="delivered" required>
                                                    <option value="1" {{ $order->delivered == 1 ? 'selected' : '' }}>Delivered</option>
                                                    <option value="0" {{ $order->delivered == 0 ? 'selected' : '' }}>Not Delivered</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Registered
                                        </label>
                                        <div class="mb-3">
                                            <select id="registeredSelect" class="form-select" name="registered" required>
                                                <option value="1" {{ $order->registered == 1 ? 'selected' : '' }}>Registered</option>
                                                <option value="0" {{ $order->registered == 0 ? 'selected' : '' }}>Not Registered</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Offer
                                        </label>
                                        <div class="mb-3">
                                            <select id="offerSelect" class="form-select" name="offer" required>
                                                <option value="1" {{ $order->offer == 1 ? 'selected' : '' }}>Offer</option>
                                                <option value="0" {{ $order->offer == 0 ? 'selected' : '' }}>No Offer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 row">
                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Total Points
                                        </label>
                                        <div>
                                            <div class="mb-3">
                                               <input class="form-control" value="{{$order->total_pts}}" name="total_pts">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Total (USD)
                                        </label>
                                        <div>
                                            <div class="mb-3">
                                               <input class="form-control" value="{{$order->total_usd}}" name="total_usd">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Total (LBP)
                                        </label>
                                        <div class="mb-3">
                                            <input class="form-control" value="{{$order->total_lbp}}" name="total_lbp">

                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn mt-3 btn-dark">Submit</button>
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
