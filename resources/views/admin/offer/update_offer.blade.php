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
                            <h6>Update Offer</h6>
                        </div>




                        <form action="{{ url('/admin/update_offer_confirm/' . $offer->id) }}" method="POST"
                            enctype="multipart/form-data" id="OuterForm" >
                            @csrf
                            <div class="card-body px-0 pt-0 pb-2">

                                <div class="row p-3">
                                    <!-- Name Input -->
                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $offer->name }}">
                                    </div>
                                    <!-- Price Input -->
                                    <div class="col-md-4 mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="price" name="price"
                                            value="{{ $offer->price }}">
                                    </div>
                                    <!-- Active Select -->
                                    <div class="col-md-4 mb-3">
                                        <label for="active" class="form-label">Active</label>
                                        <select class="form-select" id="active" name="active">
                                            <option value="1" {{ $offer->active == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $offer->active == 0 ? 'selected' : '' }}>Not Active
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <!-- Image -->
                                <div class="row">
                                    <div class="col-md-4 offset-md-4 text-center mb-3">
                                        <label for="active" class="form-label">Image</label>
                                        @if ($offer->img)
                                        <img src="/offer/{{ $offer->img }}" async class="d-block m-auto" width="200px"
                                            alt="">
                                        @else
                                        <p class="text-xs text-center text-danger font-weight-bold mb-0">
                                            No Image !
                                        </p>
                                        @endif


                                        <input type='file' class="form-control mt-3" name="img">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-block w-50 m-auto">
                                            {{-- {{ Search }} --}}
                                            <form action="{{ url('/admin/search_user') }}" method="GET">
                                                @csrf
                                                <p for="" class="text-center form-label">Search Names, Emails or Phone
                                                    Number
                                                </p>

                                                <div class="d-flex justify-content-center">

                                                    <div class="input-group mb-3 w-75">

                                                        <input type="text" name="query" class="form-control"
                                                            placeholder="example@gmail.com" style="height: 41px" id="searchInput">

                                                    </div>

                                                </div>

                                            </form>
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

                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="check-all" value="1" name="all_products"
                                                                        onchange="toggleAllProducts(this)" {{
                                                                        $offer->all_products == 1 ? 'checked ' : ''}} >
                                                                </div>
                                                            </th>
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
                                                    <!-- Table Body -->
                                                    <tbody id="SearchResults">
                                                        @forelse ($products as $data)
                                                        <tr class="text-center">
                                                            <!-- Checkbox Column -->
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input checkbox"
                                                                        type="checkbox" name="product_id[]" id="product_id"
                                                                        value="{{ $data->id }}" {{ in_array($data->id,
                                                                    $productIds) ? 'checked' : '' }}
                                                                    {{ $offer->all_products == 1 ? 'checked disabled' :
                                                                    ''}}>
                                                                    <label class="form-check-label"
                                                                        for="check-{{ $data->id }}"></label>
                                                                </div>
                                                            </td>
                                                            <!-- Image Column -->
                                                            <td>
                                                                @if(isset($productImages[$data->id]))
                                                                <img src="{{ asset('productimage/' . $productImages[$data->id]->img) }}"
                                                                    alt="Product Image" width="60px">
                                                                @endif
                                                            </td>
                                                            <!-- Product Name Column -->
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">{{ $data->name
                                                                    }}</p>
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
                                                                <p
                                                                    class="text-xs text-center text-danger font-weight-bold mb-0">
                                                                    No Data!</p>
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

                        </form>
                        <!-- Submit Button -->
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary" onclick="submitForm()">Save Offer</button>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>

    <script>
        function submitForm() {
            // Get the form element
            var form = document.getElementById('OuterForm');

            // Submit the form
            form.submit();
        }
    </script>



@php
$productImagesJson = json_encode($productImages);

@endphp

{{-- <script>
    function toggleAllProducts(checkbox) {
        var productCheckboxes = document.querySelectorAll('.checkbox');
        productCheckboxes.forEach(function(checkbox) {
            checkbox.disabled = checkbox.checked = checkbox.disabled ? false : true;
        });
    }
</script>
<script>
    $(document).ready(function () {
        $(document).on('change', '.checkbox', function () {
            if ($(this).is(':checked')) {
                var offerName = document.getElementById('name').value;
                var offerPrice = document.getElementById('price').value;
                var offerActive = document.getElementById('active').value;
                var productId = $(this).val(); // Get product_id from the checkbox value

                $.ajax({
                    type: "POST",
                    url: "/admin/add-single-offer",
                    data: {
                        product_id: productId,
                        name: offerName,
                        price: offerPrice,
                        active: offerActive,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.success) {
                            console.log('Selected product added to the database.');
                            // Update the checkbox state based on the response
                            $('#product_id_' + productId).prop('checked', true);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>


<script>
    var productImages = JSON.parse(@json($productImagesJson));
    var categories = @json($category);
    var products = @json($products);
    var offer = @json($offer);
    var productIds = @json($productIds);
    var searchTimeout;

    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            clearTimeout(searchTimeout); // Clear previous timeout
            var searchInput = $(this).val().trim();

            // Debounce the search input
            searchTimeout = setTimeout(function() {
                $.ajax({
                    url: '{{ url('admin/search_product_offer') }}',
                    type: 'get',
                    data: {
                        query: searchInput
                    },
                    success: function(response) {
                        var productsHtml = '';
                        response.forEach(function(product) {

                            var category = categories.find(cat => cat.id === product
                                .category_id);
                            var categoryName = category.name;

                            var imageUrl = productImages[product.id] ? '{{ asset('productimage') }}/' + productImages[product.id].img : '';

                            productsHtml += `
                                <tr class="text-center">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input checkbox" type="checkbox" name="product_id[]" value="${product.id}" ${productIds.includes(product.id) ? 'checked' : ''} ${offer.all_products == 1 ? 'checked disabled' : ''}>
                                            <label class="form-check-label" for="check-${product.id}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="${imageUrl}" alt="Product Image" width="60px">
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">${product.name}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">${categoryName}</p>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#SearchResults').html(productsHtml);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }, 300); // Debounce delay in milliseconds
        });
    });
</script> --}}

<script>
    var selectedProducts = [];

    function toggleAllProducts(checkbox) {
        var productCheckboxes = document.querySelectorAll('.checkbox');
        productCheckboxes.forEach(function(checkbox) {
            checkbox.disabled = checkbox.checked = checkbox.disabled ? false : true;
        });
    }

    $(document).ready(function () {
        $(document).on('change', '.checkbox', function () {
            var productId = $(this).val();
            toggleSelection(productId);
            if ($(this).is(':checked')) {
                var offerName = document.getElementById('name').value;
                var offerPrice = document.getElementById('price').value;
                var offerActive = document.getElementById('active').value;

                $.ajax({
                    type: "POST",
                    url: "/admin/add-single-offer",
                    data: {
                        product_id: productId,
                        name: offerName,
                        price: offerPrice,
                        active: offerActive,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.success) {
                            console.log('Selected product added to the database.');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });

    function toggleSelection(productId) {
        var index = selectedProducts.indexOf(productId);
        if (index === -1) {
            selectedProducts.push(productId);
        } else {
            selectedProducts.splice(index, 1);
        }
    }

    function updateCheckboxes() {
        selectedProducts.forEach(function(productId) {
            $('#product_id_' + productId).prop('checked', true);
        });
    }

    var productImages = JSON.parse(@json($productImagesJson));
    var categories = @json($category);
    var products = @json($products);
    var offer = @json($offer);
    var productIds = @json($productIds);
    var searchTimeout;

    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            clearTimeout(searchTimeout);
            var searchInput = $(this).val().trim();

            searchTimeout = setTimeout(function() {
                $.ajax({
                    url: '{{ url('admin/search_product_offer') }}',
                    type: 'get',
                    data: {
                        query: searchInput
                    },
                    success: function(response) {
                        var productsHtml = '';
                        response.forEach(function(product) {
                            var category = categories.find(cat => cat.id === product.category_id);
                            var categoryName = category.name;
                            var imageUrl = productImages[product.id] ? '{{ asset('productimage') }}/' + productImages[product.id].img : '';
                            productsHtml += `
                                <tr class="text-center">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input checkbox" type="checkbox" name="product_id[]" id="product_id_${product.id}" value="${product.id}" ${productIds.includes(product.id) ? 'checked' : ''} ${offer.all_products == 1 ? 'checked disabled' : ''}>
                                            <label class="form-check-label" for="check-${product.id}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="${imageUrl}" alt="Product Image" width="60px">
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">${product.name}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">${categoryName}</p>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#SearchResults').html(productsHtml);
                        updateCheckboxes(); // Update checkboxes after loading new content
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }, 300);
        });
    });
</script>





@include('admin.script')






</body>

</html>
