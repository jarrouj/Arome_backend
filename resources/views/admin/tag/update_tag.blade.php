
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
                            <option value="primary" class="bg-primary text-light" {{ $data->color === 'primary' ? 'selected' : '' }}>Blue</option>
                            <option value="secondary" class="bg-secondary text-light" {{ $data->color === 'secondary' ? 'selected' : '' }}>Gray</option>
                            <option value="success" class="bg-success text-light" {{ $data->color === 'success' ? 'selected' : '' }}>Green</option>
                            <option value="danger" class="bg-danger text-light" {{ $data->color === 'danger' ? 'selected' : '' }}>Red</option>
                            <option value="warning" class="bg-warning text-dark" {{ $data->color === 'warning' ? 'selected' : '' }}>Orange</option>
                            <option value="info" class="bg-info text-light" {{ $data->color === 'info' ? 'selected' : '' }}>Light Blue</option>
                            <option value="light" class="bg-light text-dark" {{ $data->color === 'light' ? 'selected' : '' }}>White</option>
                            <option value="dark" class="bg-dark text-light" {{ $data->color === 'dark' ? 'selected' : '' }}>Black</option>
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
