<button type="button" class="btn btn-dark mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="me-2 fs-6 bi bi-plus-lg"></i>
    Add Order
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Order
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/add_order') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="userSelect" class="form-label">User</label>
                        <select id="userSelect" class="form-select" name="user_id">
                            <option value="" disabled selected>Select a User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->f_name }} {{$user->l_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="paidSelect" class="form-label">Paid</label>
                        <select id="paidSelect" class="form-select" name="paid" required>
                            <option value="1">Paid</option>
                            <option value="0">Not Paid</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="methodSelect" class="form-label">Method</label>
                        <select id="methodSelect" class="form-select" name="method" required>
                            <option value="1" selected disabled>Cash</option>
                            {{-- <option value="0">Not Method</option> --}}
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="deliveredSelect" class="form-label">Delivered</label>
                        <select id="deliveredSelect" class="form-select" name="delivered" required>
                            <option value="1">Delivered</option>
                            <option value="0">Not Delivered</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="registeredSelect" class="form-label">Registered</label>
                        <select id="registeredSelect" class="form-select" name="registered" required>
                            <option value="1">Registered</option>
                            <option value="0">Not Registered</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="offerSelect" class="form-label">Offer</label>
                        <select id="offerSelect" class="form-select" name="offer" required>
                            <option value="1">Offer</option>
                            <option value="0">Not Offer</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Total Points
                        </label>
                        <input type="number" name="total_pts" class="form-control"  required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Total (LBP)
                        </label>
                        <input type="number" name="total_lbp" class="form-control" step="any" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Total (USD)
                        </label>
                        <input type="number" name="total_usd" class="form-control" step="any" required>
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
