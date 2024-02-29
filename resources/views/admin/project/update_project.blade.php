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
                            <h6>Project</h6>
                        </div>

                        <a href="{{ url('/admin/show_project') }}" class="btn btn-dark w-10 ms-4">
                            <i class="bi bi-arrow-left"></i>
                            Back
                        </a>

                        <div class="card-body px-0 pt-0 pb-2">

                            <form action="{{ url('/admin/update_project_confirm', $project->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row text-center m-3">

                                    <div class="col-6">
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

                                    <div class="col-3">
                                        <label for="">
                                            <img src="/images/en.png" width="15px" alt="">

                                            Date
                                        </label>
                                        <input type="date" name="dateen" class="form-control"
                                            value="{{ $project->dateen }}" >
                                    </div>


                                    <div class="col-3">
                                        <label for="">
                                            <img src="/images/ar.png" width="15px" alt="">

                                            Date
                                        </label>
                                        <input type="date" name="datear" class="form-control"
                                            value="{{ $project->datear }}" >
                                    </div>
                                </div>







                                <div class="row text-center m-3">
                                    <div class="col-3">
                                        <label for="">
                                            <img src="/images/en.png" width="15px" alt="">

                                            Name
                                        </label>
                                        <input type="text" name="nameen" class="form-control" value="{{ $project->nameen }}" required>

                                    </div>
                                    <div class="col-3">
                                        <label for="">
                                            <img src="/images/ar.png" width="15px" alt="">

                                            Name
                                        </label>
                                        <input type="text" name="namear" class="form-control" value="{{ $project->namear }}" required>

                                    </div>

                                    <div class="col-3">
                                        <label for="">
                                            <img src="/images/en.png" width="15px" alt="">

                                            Client
                                        </label>
                                        <input type="text" name="clienten" class="form-control"
                                        value="{{ $project->clienten }}" >

                                    </div>

                                    <div class="col-3">
                                        <label for="">
                                            <img src="/images/ar.png" width="15px" alt="">

                                            Client
                                        </label>
                                        <input type="text" name="clientar" class="form-control"
                                        value="{{ $project->clientar }}" >

                                    </div>





                                <div class="row text-center my-3">
                                    <div class="col-4">
                                        <label for="">
                                            <img src="/images/en.png" width="15px" alt="">

                                            Text
                                        </label>
                                        <textarea type="text" name="texten" class="form-control" cols="10" rows="3" required>{{ $project->texten }}</textarea>

                                    </div>
                                    <div class="col-4">
                                        <label for="">
                                            <img src="/images/ar.png" width="15px" alt="">

                                            Text
                                        </label>
                                        <textarea type="text" name="textar" class="form-control" cols="30" rows="3" required>{{ $project->textar }}</textarea>

                                    </div>

                                    <div class="col-4 d-flex flex-column align-items-center">
                                        <label for="exampleColorInput" class="mb-0">
                                            Color
                                        </label>
                                        <div class="input-container my-4">
                                            <input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" value="{{$project->color}}">
                                        </div>
                                    </div>



                                </div>


                                <div class="row text-center m-3">
                                    <div class="col-12">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Image
                                        </label>
                                    <div>
                                        <img src="/project/{{ $project->img }}" width="100px" />
                                    </div>

                                        <input type="file" name="img" class="form-control mt-3">
                                    </div>
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
