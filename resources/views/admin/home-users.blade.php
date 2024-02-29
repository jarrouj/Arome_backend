<div class="card ">
    <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
            <h6 class="mb-2">List of recent Users</h6>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Name/Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Role</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        First Visit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $data->name }}</h6>
                                    <p class="text-xs text-secondary mb-0">
                                        {{ $data->email }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">
                                @if ($data->usertype == 1)
                                    Admin
                                @else
                                    Customer
                                @endif
                            </p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            @if (Cache::has('user-is-online-' . $data->id))
                                <span class="badge badge-sm bg-gradient-success">Online</span>
                            @else
                                <span class="text-secondary">Offline</span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $data->created_at }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
