@extends('dashboard.layouts.app')

@section('content')
<div class="row flex-grow">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="card-title card-title-dash">Pending Requests</h4>
                        <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                    </div>
                    <div>
                        <a href="{{ route('dashboard.users.create') }}"
                            class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i
                                class="mdi mdi-account-plus"></i>Add new member</a>
                    </div>
                </div>
                <div class="table-responsive  mt-1">
                    <table class="table select-table">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user )

                            <tr>

                                <td>



                                    <h6>{{ $user->id }}</h6>



                                </td>
                                <td>
                                    <h6>{{ $user->name }}</h6>

                                </td>
                                <td>
                                    <h6>{{ $user->email }}</h6>

                                </td>
                                <td>
                                    @foreach ( $user->Roles as $role )
                                    <h6>{{ $role->display_name }}</h6>
                                    @endforeach

                                </td>
                                <td>
                                    <select class="form-control form-control-lg">
                                        @foreach ($user->Roles as $role )
                                        @foreach ($role->permissions as $perm )
                                        <option>{{ $perm->display_name }}</option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <div class="badge badge-opacity-warning">
                                        <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_title' , 'Main Dashboard')