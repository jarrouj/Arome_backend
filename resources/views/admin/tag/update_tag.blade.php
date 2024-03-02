
<a type="button"   class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">

    Edit
    <i class="bi bi-pencil"></i>

</a>

<div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
    aria-labelledby="exampleModal{{ $data->id }}Label{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal{{ $data->id }}Label{{ $data->id }}">
                    Tag
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/update_tag/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Name
                        </label>
                        <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Color</label>
                        <select class="form-select" name="color" id="exampleFormControlSelect1" required>
                            <option value="" disabled>Select a color</option>
                            <option value="#007bff" class="bg-primary text-light" {{ $data->color === '#007bff' ? 'selected' : '' }}>Blue</option>
                            <option value="#6c757d" class="bg-secondary text-light" {{ $data->color === '#6c757d' ? 'selected' : '' }}>Gray</option>
                            <option value="#28a745" class="bg-success text-light" {{ $data->color === '#28a745' ? 'selected' : '' }}>Green</option>
                            <option value="#dc3545" class="bg-danger text-light" {{ $data->color === '#dc3545' ? 'selected' : '' }}>Red</option>
                            <option value="#ffc107" class="bg-warning text-dark" {{ $data->color === '#ffc107' ? 'selected' : '' }}>Yellow</option>
                            <option value="#17a2b8" class="bg-info text-light" {{ $data->color === '#17a2b8' ? 'selected' : '' }}>Light Blue</option>
                            <option value="#f8f9fa" class="bg-light text-dark" {{ $data->color === '#f8f9fa' ? 'selected' : '' }}>White</option>
                            <option value="#343a40" class="bg-dark text-light" {{ $data->color === '#343a40' ? 'selected' : '' }}>Black</option>
                        </select>
                    </div>




                </div>


                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Update
                        <i class="bi bi-pencil"></i>
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
