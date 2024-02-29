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
                    Partner
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/update_process/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

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

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/en.png" width="15px" alt="">

                            Text
                        </label>
                        <textarea type="text" name="texten" class="form-control" cols="30" rows="3" required>{{ $data->texten }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/ar.png" width="15px" alt="">

                            Text
                        </label>
                        <textarea type="text" name="textar" class="form-control" cols="30" rows="3" required> {{ $data->textar }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/en.png" width="15px" alt="">

                            Word
                        </label>
                        <input type="text" name="worden" class="form-control" required value="{{ $data->worden }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/ar.png" width="15px" alt="">

                            Word
                        </label>
                        <input type="text" name="wordar" class="form-control" required value="{{ $data->wordar }}">
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
