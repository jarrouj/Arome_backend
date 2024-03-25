<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body class="g-sidenav-show bg-gray-100">

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
                            <h6>Offers</h6>
                        </div>

                        <a href="{{ url('/admin/add_offer') }}" class="btn btn-dark w-10 mx-auto">
                            <i class="me-2 fs-6 bi bi-plus-lg"></i>
                            Add
                        </a>

                          {{-- Search --}}
                          <div class="row">
                            <div class="col-12">
                                <div class="d-block w-50 m-auto mt-5">
                                    <form action="{{ url('/admin/search_product_offer') }}" method="GET">
                                        @csrf
                                        <p for="" class="text-center form-label">Search Names, Emails or
                                            Phone
                                            Number
                                        </p>

                                        <div class="d-flex justify-content-center">

                                            <div class="input-group mb-3 w-75">

                                                <input type="text" name="query" class="form-control"
                                                    placeholder="example@gmail.com" style="height: 41px "
                                                    id="searchInput">

                                                {{-- <button class="btn btn-dark" type="submit">
                                                    <i class="bi bi-search"></i>
                                                </button> --}}

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

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Image
                                            </th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Offer Name
                                            </th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Price
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Active
                                            </th>

                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="SearchResults">
                                        @forelse ($offer as $data)
                                            @if ($loop->first || $data->name != $offer[$loop->index - 1]->name)
                                                <tr class="text-center">
                                                    <td>
                                                        <img src="/offer/{{ $data->img }}" async class="d-block m-auto" width="100px" alt="">

                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $data->name }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $data->price }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        @if($data->active == 1)
                                                        <span class="badge badge-sm bg-gradient-success w-70">Active</span>
                                                        @else
                                                        <span class="badge badge-sm bg-gradient-danger w-70">Not Active</span>
                                                        @endif
                                                    </td>

                                                    <td class="align-middle">
                                                        <a href="{{ url('admin/view_offer', $data->id) }}"
                                                            class="text-primary font-weight-bold text-xs"
                                                            data-toggle="tooltip">
                                                            View
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                    </td>

                                                    <td class="align-middle">
                                                        <a href="{{ url('admin/update_offer', $data->id) }}"
                                                            class="text-success font-weight-bold text-xs"
                                                            data-toggle="tooltip">
                                                            Update
                                                            <i class="bi bi-pen"></i>
                                                        </a>
                                                    </td>

                                                    <td class="align-middle">
                                                        <a href="{{ url('admin/delete_offer', $data->id) }}"
                                                            class="text-danger font-weight-bold text-xs"
                                                            data-toggle="tooltip"
                                                            data-original-title="Edit offer"
                                                            onclick="return confirm('Are you sure you want to delete this offer?')">
                                                            Delete
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
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
                                {{ $offer->render('admin.pagination') }}
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
                    url: '{{ url('admin/search_offer') }}',
                    type: 'GET',
                    data: { query: searchInput },
                    success: function(response) {
                        var offersHtml = '';
                        response.forEach(function(offer) {
                            offersHtml += `
                                <tr class="text-center">
                                    <td>
                                        ${offer.img ? `<img src="/offer/${offer.img}" alt="Offer Image" width="60px">` : ''}
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">${offer.name}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">${offer.price}</p>
                                    </td>
                                    <td>
                                        ${offer.active == 1 ? '<span class="badge badge-sm bg-gradient-success w-70">Active</span>' : '<span class="badge badge-sm bg-gradient-danger w-70">Not Active</span>'}
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('admin/view_offer') }}/${offer.id}" class="text-primary font-weight-bold text-xs" data-toggle="tooltip">
                                            View
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('admin/update_offer') }}/${offer.id}" class="text-success font-weight-bold text-xs" data-toggle="tooltip">
                                            Update
                                            <i class="bi bi-pen"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('admin/delete_offer') }}/${offer.id}" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit offer" onclick="return confirm('Are you sure you want to delete this offer?')">
                                            Delete
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            `;
                        });
                        $('#SearchResults').html(offersHtml);
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
