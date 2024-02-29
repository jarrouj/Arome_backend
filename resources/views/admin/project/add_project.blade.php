<button type="button" class="btn btn-dark mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="me-2 fs-6 bi bi-plus-lg"></i>
    Add Project
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Project
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/add_project') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">
                                Category
                            </label>
                            <select class="form-select" name="category_id" aria-label="Pick a category">
                                <option value="-1" selected>Pick a category</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}">{{ $category->titleen }}</option>
                                @endforeach
                            </select>
                        </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Color
                        </label>
                        <input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" >
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/en.png" width="15px" alt="">

                            Name
                        </label>
                        <input type="text" name="nameen" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/ar.png" width="15px" alt="">

                            Name
                        </label>
                        <input type="text" name="namear" class="form-control" required>
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/en.png" width="15px" alt="">

                            Text
                        </label>
                        <textarea type="text" name="texten" class="form-control" cols="30" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/ar.png" width="15px" alt="">

                            Text
                        </label>
                        <textarea type="text" name="textar" class="form-control" cols="30" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/en.png" width="15px" alt="">

                            Date
                        </label>
                        <input type="date" name="dateen" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/ar.png" width="15px" alt="">

                            Date
                        </label>
                        <input type="date" name="datear" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/en.png" width="15px" alt="">

                            Client
                        </label>
                        <input type="text" name="clienten" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <img src="/images/ar.png" width="15px" alt="">

                            Client
                        </label>
                        <input type="text" name="clientar" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Image
                        </label>
                        <input type="file" name="img" class="form-control" required>
                    </div>



                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Add
                        <i class="bi bi-plus-lg"></i>
                    </button>

            </form>
        </div>
    </div>
</div>
