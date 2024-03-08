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
                            <a href="{{ url('/admin/show_offer') }}" class="btn btn-dark">
                                <i class="bi bi-arrow-left"></i>
                                back
                            </a>
                            <h6>View Offer</h6>
                        </div>


                        {{-- Search --}}
                        <div class="row">
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
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr class="text-center">

                                            <th class="text-secondary opacity-7"></th>


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

                                    Category
                                </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $data)
                                            <tr class="text-center">

                                                <td>
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" >
                                                    </div>
                                                </td>

                                                <td>
                                                    @if(isset($productImages[$data->id]))
                                                    <img src="{{ asset('productimage/' . $productImages[$data->id]->img) }}" alt="Product Image" width="60px">
                                                @endif
                                                </td>


                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->name }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @foreach ($category as $categoryy)
                                                        @if ($categoryy->id == $data->category_id)
                                                            {{ $categoryy->name }}
                                                        @endif
                                                        @endforeach
                                                    </p>
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
                                {{-- {{ $products->render('admin.pagination') }} --}}
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
