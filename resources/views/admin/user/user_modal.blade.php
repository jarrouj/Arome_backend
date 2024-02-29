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
                    {{ $data->name }}
                    @if ($data->usertype == 1)
                        <span class="badge badge-sm bg-gradient-warning">Corporate</span>
                    @elseif ($data->usertype == 2)
                        <span class="badge badge-sm bg-gradient-success">Admin</span>
                    @else
                        <span class="badge badge-sm bg-gradient-secondary">Customer</span>
                    @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label for="">email</label>
                        <p>{{ $data->email }}</p>
                    </div>
                    <div class="col-6">
                        <label for="">phone</label>
                        <p>{{ $data->phone }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="">DoB</label>
                        <p>{{ $data->dob }}</p>
                    </div>
                    <div class="col-6">
                        <label for="">address</label>
                        <p>{{ $data->address }}</p>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-6">
                        <label for="">National Id (front)</label>
                        @if ($data->fnational != null)
                            <img src="/user/{{ $data->fnational }}" class="w-25" alt="">
                        @else
                            <p class="text-xs text-danger font-weight-bold mb-0">
                                No Data!
                            </p>
                        @endif
                    </div>
                    <div class="col-6">
                        <label for="">National Id (back)</label>
                        @if ($data->bnational != null)
                            <img src="/user/{{ $data->bnational }}" class="w-25" alt="">
                        @else
                            <p class="text-xs text-danger font-weight-bold mb-0">
                                No Data!
                            </p>
                        @endif
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-6">
                        <label for="">Driving License (front)</label>
                        @if ($data->fdriving != null)
                            <img src="/user/{{ $data->fdriving }}" class="w-25" alt="">
                        @else
                            <p class="text-xs text-danger font-weight-bold mb-0">
                                No Data!
                            </p>
                        @endif
                    </div>
                    <div class="col-6">
                        <label for="">Driving License (back)</label>
                        @if ($data->bdriving != null)
                            <img src="/user/{{ $data->bdriving }}" class="w-25" alt="">
                        @else
                            <p class="text-xs text-danger font-weight-bold mb-0">
                                No Data!
                            </p>
                        @endif
                    </div>
                </div>

                @if ($data->usertype != 0)
                    <div class="row">
                        <div class="col-6">
                            <label for="">Age Restriction</label>
                            @if ($data->age_rest != null)
                                <p>{{ $data->age_rest }} +</p>
                            @else
                                <p class="text-xs text-danger font-weight-bold mb-0">
                                    No Data!
                                </p>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="">Delivery</label>
                            @if ($data->delivery != null)
                                <p>{{ $data->delivery }} $</p>
                            @else
                                <p class="text-xs text-danger font-weight-bold mb-0">
                                    No Data!
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="">Logo</label>
                            @if ($data->logo != null)
                                <div class="">
                                    <img src="/user/{{ $data->logo }}" class="w-25" alt="">
                                </div>
                            @else
                                <p class="text-xs text-danger font-weight-bold mb-0">
                                    No Data!
                                </p>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="">Discount Price</label>
                            @if ($data->dscprice != null)
                                <p>{{ $data->dscprice }} $</p>
                            @else
                                <p class="text-xs text-danger font-weight-bold mb-0">
                                    No Data!
                                </p>
                            @endif
                        </div>
                    </div>
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
