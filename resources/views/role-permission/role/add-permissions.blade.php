@include('sidebar.head')

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">

            @if(session('status')){
            <div class="alert alert-success">
                {{ session('status')}}
            </div>
            }
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add {{$role->name}}</h4>
                    <a href="{{url('roles')}}" class="btn btn-danger float-end"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{url('roles/'.$role->id.'/give-permissions')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            @error('permission')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                            <label class="label" style="font-size: larger; font-weight:900" for="">Permissions</label>

                            <div class="row mt-2">
                                <table class="table">

                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td>
                                            <div class="col-md-2">
                                                <label>
                                                    <input type="checkbox"
                                                        name="permission[]"
                                                        value="{{$permission->name}}"
                                                        {{ in_array($permission->id, $rolepermissions) ? 'checked': ''}}
                                                        class="form-checkbox"
                                                        placeholder="Enter Role" />
                                                    {{$permission->name}}
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>

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