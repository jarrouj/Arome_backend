<button type="button" class="btn btn-dark mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="me-2 fs-6 bi bi-envelope-fill"></i>
    Send Email
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Email
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/send_mail') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Title
                        </label>
                        <input type="text" name="title" class="form-control" required placeholder="Email Title">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Text
                        </label>
                        <textarea type="text" name="text" class="form-control" required placeholder="Email Text"></textarea>
                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Send
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
