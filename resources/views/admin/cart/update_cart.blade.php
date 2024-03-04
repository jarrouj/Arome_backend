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
                    Cart
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/update_cart/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="userSelect" class="form-label">User</label>
                        <select id="userSelect" class="form-select" name="user_id">
                            <option value="" disabled selected>Select a User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $data->user_id ? 'selected' : '' }}>{{ $user->f_name }} {{$user->l_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="productSelect" class="form-label">Product</label>
                        <select id="productSelect" class="form-select" name="product_id">
                            <option value="" disabled selected>Select a Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $data->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                            @endforeach
                        </select>
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
