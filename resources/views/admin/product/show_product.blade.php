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
                            <h6>Products</h6>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">

                                    @include('admin.product.add_product')

                                </div>
                            </div>
                        </div>

                        {{-- Search --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="d-block w-50 m-auto">
                                    <form action="{{ url('/admin/search_product') }}" method="GET">
                                        @csrf
                                        <p for="" class="text-center form-label">Search Names, Emails or Phone
                                            Number
                                        </p>

                                        <div class="d-flex justify-content-center">

                                            <div class="input-group mb-3 w-75">

                                                <input type="text" name="query" class="form-control"
                                                    placeholder="example@gmail.com" style="height: 41px "
                                                    id="searchInput">

                                                <button class="btn btn-dark" type="submit">
                                                    <i class="bi bi-search"></i>
                                                </button>

                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- Add Image Button --}}
                            <div class="col-4">
                                <div class="d-flex justify-content-center">

                                    @include('admin.product.add_product_image')
                                </div>
                            </div>
                            {{-- Add Size Button --}}
                            <div class="col-4">
                                <div class="d-flex justify-content-center">

                                    @include('admin.size.add_size')

                                </div>
                            </div>
                            {{-- Add Smell Button --}}
                            <div class="col-4">
                                <div class="d-flex justify-content-center">

                                    @include('admin.smell.add_smell')

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

                                                Image
                                            </th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                Name
                                            </th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                Description
                                            </th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                Category
                                            </th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                Tag
                                            </th>

                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="searchResults">
                                        @forelse ($product as $data)
                                            <tr class="text-center">
                                                <td>
                                                    @if (isset($productImages[$data->id]))
                                                        <img src="{{ asset('productimage/' . $productImages[$data->id]->img) }}"
                                                            alt="Product Image" width="60px">
                                                    @endif
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->name }}
                                                    </p>
                                                </td>

                                                <td>
                                                    @if ($data->description)
                                                        <i class="fa fa-check text-success"></i>
                                                    @else
                                                        <i class="fa fa-times text-danger"></i>
                                                    @endif
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

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @foreach ($tag as $tagItem)
                                                            @if ($tagItem->id == $data->tag_id)
                                                                <span
                                                                    class="badge rounded-pill text-bg-{{ $tagItem->color }}">{{ $tagItem->name }}</span>
                                                            @endif
                                                        @endforeach
                                                    </p>
                                                </td>

                                                <td class="align-middle">
                                                    <a href="{{ url('admin/view_product', $data->id) }}"
                                                        class="text-primary font-weight-bold text-xs"
                                                        data-toggle="tooltip">
                                                        View
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </td>


                                                <td class="align-middle">
                                                    <a href="{{ url('admin/update_product', $data->id) }}"
                                                        class="text-success font-weight-bold text-xs"
                                                        data-toggle="tooltip">
                                                        Update
                                                        <i class="bi bi-pen"></i>
                                                    </a>
                                                </td>

                                                <td class="align-middle">
                                                    <a href="{{ url('admin/delete_product', $data->id) }}"
                                                        class="text-danger font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit product"
                                                        onclick="return confirm('Are you sure you want to delete this product?')">
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
                                {{ $product->render('admin.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>

    @php
        $productImagesJson = json_encode($productImages);

    @endphp

    @include('admin.script')

    <script>
        var productImages = JSON.parse(@json($productImagesJson));
        var categories = @json($category);
        var tags = @json($tag);

        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var searchInput = $('#searchInput').val();

                $.ajax({
                    url: '{{ url('admin/search_product') }}',
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



                            var tag = tags.find(tag => tag.id === product.tag_id);

                            var tagsHtml = '';
                            tagsHtml +=
                                `<span class="badge rounded-pill text-bg-${tag.color}">${tag.name}</span>`;

                            productsHtml += `
                                <tr class="text-center">
                                    <td>
                                        ${product.image ? '' : `<img src="{{ asset('productimage/') }}/${productImages[product.id].img}" alt="Product Image" width="60px">`}
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">${product.name}</p>
                                    </td>
                                    <td>
                                        ${product.description ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'}
                                    </td>
                                    <td>
                                <p class="text-xs font-weight-bold mb-0">${categoryName}</p>
                            </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">${tagsHtml}</p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('admin/view_product') }}/${product.id}" class="text-primary font-weight-bold text-xs" data-toggle="tooltip">
                                            View
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('admin/update_product') }}/${product.id}" class="text-success font-weight-bold text-xs" data-toggle="tooltip">
                                            Update
                                            <i class="bi bi-pen"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('admin/delete_product') }}/${product.id}" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit product" onclick="return confirm('Are you sure you want to delete this product?')">
                                            Delete
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#searchResults').html(productsHtml);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>



</body>

</html>
