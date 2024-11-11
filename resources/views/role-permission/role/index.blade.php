@include('sidebar.head')
@include('role-permission.nav-link')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if(session('status'))
            <div class="alert alert-success"> {{session('status')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4> Role</h4>
                    <a href="{{url('roles/create')}}" class="btn btn-primary float-end"> Add Role</a>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>Name</td>
                                <td> Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td> {{$role->name }}</td>
                                <td>
                                    <a href="{{url('roles/'.$role->id.'/give-permissions')}}" class="btn btn-success">Add/Edit Role Permission</a>
                                    <a href="{{url('roles/'.$role->id.'/edit')}}" class="btn btn-success">Edit</a>

                                    <a href="{{url('roles/'.$role->id.'/delete')}}" class="btn btn-danger mx-2"> Delete</a>
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