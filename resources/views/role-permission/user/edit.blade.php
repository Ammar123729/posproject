@include('sidebar.head')

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Users</h4>
                    <a href="{{url('users')}}" class="btn btn-danger float-end"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{url('users/'.$user->id.'/update')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="label" for="">User Name</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Enter Role" />
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="label" for="">User Email</label>
                            <input type="email" name="email" readonly value="{{$user->email}}" class="form-control" placeholder="Enter Role" />
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="label" for="">User Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Enter Role" />
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="label" for="">User Assign Role</label>
                            <select class="form-control" name="roles[]" multiple>
                                @foreach($roles as $role)
                                <option value="{{ $role }}"
                                    {{in_array($role, $userRoles) ? 'selected' : ''}}>{{ $role}}</option> <!-- Correctly pass the role name -->
                                @endforeach
                            </select>
                            @error('roles')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- <div class="mb-3">
                            <label class="label" for="">Cell Number</label>
                            <input type="number" name="phone" value="{{$user->phone}}" class="form-control" placeholder="Enter Role" />
                        </div> -->

                        <!-- <div class="mb-3">
                            <label class="label" for="">Store Name</label>
                            <input type="text" name="store_name" value="{{$user->store_name}}" class="form-control" />
                        </div> -->

                        <!-- <div class="mb-3">
                            <label class="label" for="">Date</label>
                            <input type="date" name="date" value="{{$user->date}}" class="form-control" placeholder="Enter Role" />
                        </div> -->

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