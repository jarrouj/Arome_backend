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
                    Pop
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/update_pop/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3 d-flex flex-column align-items-center">
                        <label for="exampleFormControlInput1" class="form-label">
                            Color
                        </label>
                        <div class="input-container">
                            <input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" value="{{$data->color}}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/en.png" width="15px" alt="">

                            Title
                        </label>
                        <input type="text" name="titleen" class="form-control" required value="{{ $data->titleen }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/ar.png" width="15px" alt="">

                            Title
                        </label>
                        <input type="text" name="titlear" class="form-control" required value="{{ $data->titlear }}">
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
