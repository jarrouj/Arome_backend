<button type="button" class="btn btn-dark mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="bi bi-pencil"></i>
    Update
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Service Page
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/update_service_page/' . $service_page->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Image 1
                        </label>
                        <div class="d-flex flex-column align-items">
                            <img src="/service_page/{{ $service_page->img1 }}" width="100px" class="mb-2" alt="Image 1">
                            <input type="file" name="img1" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Image 2
                        </label>
                        <div class="d-flex flex-column align-items">
                            <img src="/service_page/{{ $service_page->img2 }}" width="100px" class="mb-2" alt="Image 1">
                            <input type="file" name="img2" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Image 3
                        </label>
                        <div class="d-flex flex-column align-items">
                            <img src="/service_page/{{ $service_page->img3 }}" width="100px" class="mb-2" alt="Image 1">
                            <input type="file" name="img3" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Image 4
                        </label>
                        <div class="d-flex flex-column align-items">
                            <img src="/service_page/{{ $service_page->img4 }}" width="100px" class="mb-2" alt="Image 1">
                            <input type="file" name="img4" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/en.png" width="15px" alt="">

                            Title
                        </label>
                        <input type="text" name="titleen" class="form-control" value="{{ $service_page->titleen }}" >
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/ar.png" width="15px" alt="">

                            Title
                        </label>
                        <input type="text" name="titlear" class="form-control" value="{{ $service_page->titlear }}"  >
                    </div>


                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Update
                        <i class="bi bi-plus-lg"></i>
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
