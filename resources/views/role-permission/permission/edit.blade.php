@include('sidebar.head')

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Permission</h4>
                    <a href="{{url('permissions')}}" class="btn btn-danger float-end"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{url('permissions/'.$permission->id.'/update')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="label" for="">Permission Name</label>
                            <input type="text" name="name" class="form-control" value="{{$permission->name}}" placeholder="Enter Permission" />
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit"> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sidebar.footbar')