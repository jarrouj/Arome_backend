<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body class="g-sidenav-show   bg-gray-100">

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
                            <h6>Description</h6>
                        </div>

                        <a href="{{ url('/admin/show_description') }}" class="btn btn-dark w-10 ms-4">
                            <i class="bi bi-arrow-left"></i>
                            Back
                        </a>

                        <div class="card-body px-0 pt-0 pb-2">

                            <form action="{{ url('/admin/update_description_confirm', $description->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row text-center m-3">

                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Project
                                        </label>
                                        <select class="form-select" name="project_id" aria-label="Pick a project">
                                            <option value="-1" selected>Pick a project</option>
                                            @foreach ($project as $project)
                                            <option value="{{ $project->id }}">{{ $project->nameen }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <label for="">
                                            <img src="/images/en.png" width="15px" alt="">

                                            Title
                                        </label>
                                        <input type="text" name="titleen" class="form-control"
                                            value="{{ $description->titleen }}" >
                                    </div>


                                    <div class="col-3">
                                        <label for="">
                                            <img src="/images/ar.png" width="15px" alt="">

                                            Title
                                        </label>
                                        <input type="text" name="titlear" class="form-control"
                                            value="{{ $description->titlear }}" >
                                    </div>
                                </div>

                                <div class="row text-center m-3">
                                    <div class="col-6">
                                        <label for="">
                                            <img src="/images/en.png" width="15px" alt="">

                                            Text
                                        </label>
                                        <textarea type="text" name="texten" class="form-control" cols="30" rows="3" required>{{ $description->texten }}</textarea>

                                    </div>
                                    <div class="col-6">
                                        <label for="">
                                            <img src="/images/ar.png" width="15px" alt="">

                                            Text
                                        </label>
                                        <textarea type="text" name="textar" class="form-control" cols="30" rows="3" required>{{ $description->textar }}</textarea>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button class="d-block m-auto btn btn-dark w-10 text-center"
                                            type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>

    @include('admin.script')

</body>

</html>
