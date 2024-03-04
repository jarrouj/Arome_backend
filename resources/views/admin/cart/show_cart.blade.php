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
                            <h6>Cart</h6>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">

                                    @include('admin.cart.add_cart')

                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr class="text-center">
                                            {{-- <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Product Image
                                            </th> --}}
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                User
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Product Name
                                            </th>
                                            {{-- <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                            Category
                                        </th>
                                        <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                        Size
                                    </th>
                                    <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Price
                                </th> --}}

                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cart as $data)
                                            <tr class="text-center">
                                                {{-- <td class="bg-primary">
                                                        <img src="/productimage/{{ $productImage->img }}" async class="d-block m-auto" width="50px" alt="">

                                                </td> --}}


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
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @foreach ($products as $product)
                                                        @if ($product->id == $data->product_id)
                                                        {{ $product->name}}

                                                        @endif
                                                        @endforeach
                                                    </p>
                                                </td>

                                                <td class="align-middle">
                                                  @include('admin.cart.update_cart')
                                                </td>

                                                <td class="align-middle">
                                                    <a href="{{ url('admin/delete_cart', $data->id) }}"
                                                        class="text-danger font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit cart"
                                                        onclick="return confirm('Are you sure you want to delete this cart?')">
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
                                {{ $cart->render('admin.pagination') }}
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
