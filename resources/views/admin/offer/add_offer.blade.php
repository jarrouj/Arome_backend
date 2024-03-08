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
                            <h6>View offer</h6>
                        </div>
                        <div class="card-body px-auto pt-0 pb-2">

                            <div class="mt-4 row">
                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                        <p class="text-xs font-weight-bold mb-0">{{ $offer->name }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="categorySelect" class="form-label">Category</label>
                                        @foreach($category as $category)
                                            @if($category->id == $offer->category_id)
                                                <p class="text-xs font-weight-bold mb-0">{{ $category->name }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        <label for="tagSelect" class="form-label">Tag</label>
                                        @foreach($tag as $tag)
                                            @if($tag->id == $offer->tag_id)
                                                <p class="text-xs font-weight-bold mb-0">{{ $tag->name }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="mt-4 row justify-content-center">
                            <div class="col-4"></div>
                            <div class="col-4 col-md-2">
                                <div class="mb-3 text-center">
                                    <label for="exampleInputPassword1" class="form-label">
                                        Description
                                    </label>
                                    <p class="form-control-plaintext">{{ $offer->description }}</p>
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>


                            {{-- Images --}}
                            <div class="container d-flex justify-content-center">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="max-width: 400px;">
                                    <ol class="carousel-indicators">
                                        @foreach($offerImage as $index => $image)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>

                                    <div class="carousel-inner">
                                        @foreach($offerImage as $index => $image)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img class="d-block w-100" src="{{ asset('offerimage/' . $image->img) }}" alt="Slide {{ $index + 1 }}" style="max-height: 300px;">
                                            </div>
                                        @endforeach
                                    </div>

                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>


                           {{-- Size --}}

                            <div class="mt-4 row">

                                <div class="col-12">
                                    <h6>Size</h6>


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

                                                            {{-- <th class="text-secondary opacity-7"></th>
                                                            <th class="text-secondary opacity-7"></th> --}}
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

                                                                {{-- <td class="align-middle">
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
                                                                </td> --}}
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
                                    <h6>Smell</h6>


                                    {{-- <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center">

                                                @include('admin.smell.add_smell')

                                            </div>
                                        </div>
                                    </div> --}}
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


                                                            {{-- <th class="text-secondary opacity-7"></th>
                                                            <th class="text-secondary opacity-7"></th> --}}
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



                                                                {{-- <td class="align-middle">
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
                                                                </td> --}}
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
                                                {{ $smell->render('admin.pagination') }}
                                            </div>
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
