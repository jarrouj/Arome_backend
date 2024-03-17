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
                            <h6>General Section</h6>
                        </div>

                        <a href="{{ url('/admin/show_general') }}" class="btn btn-dark w-10 ms-4">
                            <i class="bi bi-arrow-left"></i>
                            Back
                        </a>

                        <div class="card-body px-0 pt-0 pb-2">

                            <form action="{{ url('/admin/update_general_confirm', $general->id) }}" method="POST"
                                enctype="multipart/form-data" class="mx-3">
                                @csrf


                                <div class="row text-center my-3">
                                    <div class="col-4">
                                        <label for="">
                                            <img src="/images/en.png" width="15px" alt="">
                                            Api
                                        </label>
                                        <input required name="api" id="" class="p-3 form-control"  value="{{ $general->api }}" />
                                    </div>
                                    <div class="col-4">
                                        <label for="">
                                            Info Guide
                                        </label>
                                        <input required name="info_guide" id="" class="p-3 form-control"  value=" {{$general->info_guide}} " />
                                    </div>
                                    <div class="col-4">
                                        <label for="">
                                            New User
                                        </label>
                                        <input required name="new_user" id="" class="p-3 form-control"  value=" {{$general->new_user}} " />
                                    </div>
                                </div>




                                <div class="row text-center my-3">
                                  <div class="col-4">
                                        <label for="">
                                            Shipping Cost
                                        </label>
                                        <input required name="shipping_cost" id="" class="p-3 form-control"  value="{{$general->shipping_cost}}" />
                                    </div>
                                    <div class="col-4">
                                        <label for="">
                                            Shipping Text
                                        </label>
                                        <input required name="shipping_text" id="" class="p-3 form-control"  value="{{$general->shipping_text}}" />
                                    </div>

                                    <div class="col-4">
                                        <label for="">
                                            Additional Info
                                        </label>
                                        <textarea required name="additional_info" id="" class="p-3 form-control" cols="5" rows="2" >{{ $general->additional_info }}</textarea>
                                    </div>


                                </div>

                                <div class="row text-center my-3">
                                    <div class="col-4">
                                          <label for="">
                                              Subscriber Discount
                                          </label>
                                          <input required type="number" name="subscriber_discount" step="any" class="p-3 form-control"  value="{{$general->subscriber_discount}}" />
                                      </div>
                                      <div class="col-4">
                                          <label for="">
                                              Pixel
                                          </label>
                                          <input required name="pixel" id="" class="p-3 form-control"  value="{{$general->pixel}}" />
                                      </div>

                                      <div class="col-4">
                                          <label for="">
                                              Meta Script
                                          </label>
                                          <input required name="meta_script" id="" class="p-3 form-control"  value="{{$general->meta_script}}" />
                                      </div>


                                  </div>


                                <div class="row mt-4">
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
