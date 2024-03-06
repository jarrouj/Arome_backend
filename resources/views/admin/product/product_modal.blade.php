<!-- Button trigger modal -->
<a href="" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal"
    data-bs-target="#exampleModal{{ $data->id }}">
    View <i class="bi bi-eye"></i>
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $data->id }}">
                    <span class="badge badge-sm bg-gradient-secondary">Product Name : </span>

                    {{ $data->name }}

                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <label for="">Category</label>
                        <p>{{ $data->category_id }}</p>
                    </div>
                    <div class="col-4">
                        <label for="">Tag</label>
                        <p>{{ $data->tag_id }}</p>
                    </div>

                    <div class="col-4">
                        <label for="">Description</label>
                        <p>{{ $data->description }}</p>
                    </div>
                </div>

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      @foreach($productImage as $index => $image)
                      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" @if($index === 0) class="active" @endif></li>
                      @endforeach
                    </ol>
                    <div class="carousel-inner">
                      @foreach($productImage as $index => $image)
                      <div class="carousel-item @if($index === 0) active @endif">
                        <img class="d-block w-100" src="{{ asset('productimage/' . $image->img) }}" alt="Slide {{ $index + 1 }}">
                      </div>
                      @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


