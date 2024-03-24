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
                            <a href="{{ url('/admin/show_product') }}" class="btn btn-dark">
                                <i class="bi bi-arrow-left"></i>
                                back
                            </a>
                            <h6>Edit Product</h6>
                        </div>
                        <div class="card-body px-auto pt-0 pb-2">





                            <form action="{{ url('/admin/update_product_confirm', $product->id) }}" method="POST"
                                enctype="multipart/form-data" id="OuterForm">
                                @csrf



                                <div class="mt-4 row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" required value="{{ $product->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="categorySelect" class="form-label">Category</label>
                                            <select class="form-select" name="category_id" id="categorySelect">
                                                <option value="" disabled>Select a Category</option>
                                                @foreach($category as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="tagSelect" class="form-label">Tag</label>
                                            <select class="form-select" name="tag_id" id="tagSelect">
                                                <option value="" disabled>Select a Tag</option>
                                                @foreach($tag as $tag)
                                                    <option value="{{ $tag->id }}" {{ $tag->id == $product->tag_id ? 'selected' : '' }}>
                                                        {{ $tag->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                 <div class="mt-4 row">

                                    <div class="col-12">
                                        <label for="exampleInputPassword1" class="form-label">
                                            Description
                                        </label>
                                        <div class="mb-3">
                                           <textarea name="description" cols="5" rows="5" class="form-control" >{{ $product->description }}</textarea>
                                        </div>
                                    </div>

                                </div>





                                <div class="d-flex justify-content-center">
                                </div>
                            </form>

                              {{-- Images --}}

                              <div class="mt-4 row">

                                <div class="col-12">
                                    <label for="exampleInputPassword1" class="form-label">
                                       Product Images
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



                                                            <th class="text-secondary opacity-7"></th>
                                                            <th class="text-secondary opacity-7"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($productImage as $data)
                                                            <tr class="text-center">

                                                                <td>
                                                                        <img src="/productimage/{{ $data->img }}" width="100px" />
                                                                </td>




                                                                <td class="align-middle">
                                                                  @include('admin.product.update_product_image')
                                                                </td>

                                                                <td class="align-middle">
                                                                    <a href="{{ url('admin/delete_product_image', $product->id) }}"
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
                                                {{ $productImage->render('admin.pagination') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                              {{-- Size --}}
     <div class="mt-4 row">

        <div class="col-12">
            <label for="exampleInputPassword1" class="form-label">
               Size
            </label>


            <div class="mb-3">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr class="text-center">

                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                        Size
                                    </th>

                                    <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Price
                                </th>

                                <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                Quantity
                            </th>

                            <th
                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                            Points
                        </th>

                                    <th class="text-secondary opacity-7"></th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($size as $data)
                                    <tr class="text-center">

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $data->size }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $data->price }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $data->qty_tq }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $data->points }}
                                            </p>
                                        </td>

                                        <td class="align-middle">
                                          @include('admin.size.update_size')
                                        </td>

                                        <td class="align-middle">
                                            <a href="{{ url('admin/delete_size', $data->id) }}"
                                                class="text-danger font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit size"
                                                onclick="return confirm('Are you sure you want to delete this Size?')">
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
                        {{ $size->render('admin.pagination') }}
                    </div>
                </div>
            </div>
        </div>

    </div>



                          {{-- Smell --}}
                          <div class="mt-4 row">

                            <div class="col-12">
                                <label for="exampleInputPassword1" class="form-label">
                                   Smell
                                </label>


                                <div class="mb-3">
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr class="text-center">

                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                            Smell
                                                        </th>


                                                        <th class="text-secondary opacity-7"></th>
                                                        <th class="text-secondary opacity-7"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($smell as $data)
                                                        <tr class="text-center">

                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $data->smell }}
                                                                </p>
                                                            </td>



                                                            <td class="align-middle">
                                                              @include('admin.smell.update_smell')
                                                            </td>

                                                            <td class="align-middle">
                                                                <a href="{{ url('admin/delete_smell', $data->id) }}"
                                                                    class="text-danger font-weight-bold text-xs"
                                                                    data-toggle="tooltip" data-original-title="Edit smell"
                                                                    onclick="return confirm('Are you sure you want to delete this smell?')">
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
                                            {{-- {{ $product->render('admin.pagination') }} --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-dark" onclick="submitForm()">Submit</button>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>

    @include('admin.script')

    <script>
        function submitForm() {
            // Get the form element
            var form = document.getElementById('OuterForm');

            // Submit the form
            form.submit();
        }
    </script>
</body>

</html>
