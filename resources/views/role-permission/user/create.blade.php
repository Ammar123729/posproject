@include('sidebar.head')

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Users</h4>
                    <a href="{{url('users')}}" class="btn btn-danger float-end"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{url('users/store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="label" for="">User Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Role" />
                        </div>
                        <div class="mb-3">
                            <label class="label" for="">User Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Role" />
                        </div>

                        <div class="mb-3">
                            <label class="label" for="">User Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Enter Role" />
                        </div>

                     
                        <div class="mb-3">
                            <label class="label" for="">User Assign Role</label>
                            <select class="form-control" name="roles[]" multiple>
                                @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option> <!-- Correctly pass the role name -->
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="label" for="">Cell Number</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Role" />
                        </div>

                        <div class="mb-3">
                            <label class="label" for="">Store Name</label>
                            <input type="text" name="store_name" class="form-control" placeholder="Enter Role" />
                        </div>

                        <div class="mb-3">
                            <label class="label" for="">Date</label>
                            <input type="date" name="date" class="form-control" placeholder="Enter Role" />
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