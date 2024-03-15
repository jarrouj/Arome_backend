<button type="button" class="btn btn-dark mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="me-2 fs-6 bi bi-plus-lg"></i>
    Add Tag
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Tag
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/add_tag') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Name
                        </label>
                        <input type="name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Color</label>
                        <select class="form-select" name="color" id="exampleFormControlSelect1" required>
                            <option value="" disabled selected>Select a color</option>
                            <option value="primary" class="bg-primary text-light">Blue</option>
                            <option value="secondary" class="bg-secondary text-light">Gray</option>
                            <option value="success" class="bg-success text-light">Green</option>
                            <option value="danger" class="bg-danger text-light">Red</option>
                            <option value="warning" class="bg-warning text-dark">Orange</option>
                            <option value="info" class="bg-info text-light">Light Blue</option>
                            <option value="light" class="bg-light text-dark">White</option>
                            <option value="dark" class="bg-dark text-light">Black</option>
                        </select>
                    </div>




                </div>


                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Add
                        <i class="bi bi-plus-lg"></i>
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
