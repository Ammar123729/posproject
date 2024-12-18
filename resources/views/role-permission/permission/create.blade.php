@include('sidebar.head')

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Permission</h4>
                    <a href="{{url('permissions')}}" class="btn btn-danger float-end"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{url('permissions/store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="label" for="">Permission Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Permission" />
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit"> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sidebar.footbar')