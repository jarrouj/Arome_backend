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
                            <h6>Add Offer</h6>
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

                        <form action="{{ url('/admin/add_offer_confirm') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body px-0 pt-0 pb-2">

                                <div class="row p-3">
                                    <!-- Name Input -->
                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <!-- Price Input -->
                                    <div class="col-md-4 mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="price" name="price" step="any">
                                    </div>
                                    <!-- Active Select -->
                                    <div class="col-md-4 mb-3">
                                        <label for="active" class="form-label">Active</label>
                                        <select class="form-select" id="active" name="active">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                    </div>
                                </div>

                                 <!-- Image -->
                                 <div class="row">
                                     <div class="col-md-4 offset-md-4 text-center mb-3">
                                        <label for="active" class="form-label">Image</label>

                                         <input  type='file' class="form-control" name="img" >
                                     </div>
                                 </div>

                                 <div class="row">
                                    <div class="col-12">
                                        <div class="d-block w-50 m-auto">
                                            {{-- <form action="{{ url('/admin/search_user') }}" method="POST">
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

                                            </form> --}}
                                        </div>
                                       <div class="col-12">
                                         <!-- Product Table -->
                                         <div class="table-responsive">
                                            <table class="table align-items-center mb-0">
                                                <!-- Table Headings -->
                                                <thead>
                                                    <!-- Table Header Row -->
                                                    <tr class="text-center">
                                                        <th class="text-secondary opacity-7">
                                                            <div class="form-check">
                                                                {{-- <label class="form-check-label" for="check-all">All Products</label> --}}

                                                                <input class="form-check-input" type="checkbox" id="check-all"
                                                                    value="0" name="all_products" onchange="toggleAllProducts(this)">
                                                            </div>
                                                        </th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Image
                                                        </th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Product Name
                                                        </th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Category
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <!-- Table Body -->
                                                <tbody>
                                                    @forelse ($products as $data)
                                                        <tr class="text-center">
                                                            <!-- Checkbox Column -->
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input checkbox" type="checkbox" name="product_id[]" value="{{ $data->id }}">
                                                                    <label class="form-check-label" for="check-{{ $data->id }}"></label>
                                                                </div>
                                                            </td>
                                                            <!-- Image Column -->
                                                            <td>
                                                                @if(isset($productImages[$data->id]))
                                                                    <img src="{{ asset('productimage/' . $productImages[$data->id]->img) }}" alt="Product Image" width="60px">
                                                                @endif
                                                            </td>
                                                            <!-- Product Name Column -->
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">{{ $data->name }}</p>
                                                            </td>
                                                            <!-- Category Column -->
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
                                                        <!-- Empty Data Row -->
                                                        <tr>
                                                            <td colspan="4">
                                                                <p class="text-xs text-center text-danger font-weight-bold mb-0">No Data!</p>
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
                            <!-- Submit Button -->
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Save Offer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>



    <script>
        function toggleAllProducts(checkbox) {
            var productCheckboxes = document.querySelectorAll('.checkbox');
            productCheckboxes.forEach(function(checkbox) {
                checkbox.disabled = checkbox.checked = checkbox.disabled ? false : true;
            });
        }
    </script>

    @include('admin.script')
</body>
</html>
