<a type="button"   class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModalSize{{ $data->id }}">

    Edit
    <i class="bi bi-pencil"></i>

</a>

<div class="modal fade" id="exampleModalSize{{ $data->id }}" tabindex="-1"
    aria-labelledby="exampleModalSize{{ $data->id }}Label{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalSize{{ $data->id }}Label{{ $data->id }}">
                    Size
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/update_size/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Size
                        </label>
                        <input type="text" name="size" class="form-control" required value="{{ $data->size }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Price
                        </label>
                        <input type="number" name="price" class="form-control" step="any" required value="{{ $data->price }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Quantity
                        </label>
                        <input type="number" name="qty_tq" class="form-control" required value="{{ $data->qty_tq }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Points
                        </label>
                        <input type="text" name="points" class="form-control" required value="{{ $data->points }}">
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
