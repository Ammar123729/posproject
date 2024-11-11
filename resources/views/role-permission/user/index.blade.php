@include('sidebar.head')
@include('role-permission.nav-link')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12">
            @if(session('status'))
            <div class="alert alert-success"> {{session('status')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h2> User</h2>
                    <a href="{{url('users/create')}}" class="btn btn-primary float-end"> Add User</a>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>Name</td>
                                <td> Email </td>
                                <td>Roles </td>
                                <td> Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td> {{$user->name }}</td>
                                <td> {{$user->email}}</td>
                                <td>
                                    @if(!empty( $user->getRoleNames()))
                                    @foreach( $user->getRoleNames() as $rolename)
                                    <label class="badge bg-primary mx-1">{{$rolename}}</label>
                                    @endforeach
                                    @endif
                                </td>
                                <td>

                                    <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-success">Edit</a>

                                    <a href="{{url('users/'.$user->id.'/delete')}}" class="btn btn-danger mx-2"> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sidebar.footbar')