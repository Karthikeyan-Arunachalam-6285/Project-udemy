<x-admin-master>

    @section('content')
    <h1>User profile name:{{$user['name']}}</h1>

    <form   method="post" action="{{route('update-userprofile',$user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
         @if(Session::get('message'))
         <div class="alert alert-success"  role="alert">{{Session::get('message')}}</div>
         @endif
         
        <div class="form-group">
            <label   for="title">Name</label>
            <div class="col-md-4">
                <input type="text" name="name"id="name" placeholder="Enter name" value="{{$user['name']}}"class="form-control"/>
                <span style="color:red">@error('name'){{$message}}@enderror</span>
             </div>
        </div>
        <div class="form-group">
            <label   for="title">email</label>
            <div class="col-md-4">
                <input type="text" name="email"id="email" placeholder="Enter email address" value="{{$user['email']}}"class="form-control"/>
                <span style="color:red">@error('email'){{$message}}@enderror</span>
             </div>
        </div>
        <div class="form-group">
            <label   for="title">Password</label>
            <div class="col-md-4">
                <input type="password" name="password"id="password" placeholder="Enter password" value="{{$user['password']}}"class="form-control"/>
                <span style="color:red">@error('password'){{$message}}@enderror</span>
             </div>
        </div>
        <div class="form-group">
            <label   for="title">Confirm Password</label>
            <div class="col-md-4">
                <input type="password" name="confirm password"id="confirm password" placeholder="Enter confirm password" value="{{$user['password']}}"class="form-control"/>
                <span style="color:red">@error('confirm password'){{$message}}@enderror</span>
             </div>
        </div>

        <input type="Submit" class="btn btn-primary">
        <input type="hidden" name="id" value="{{$user['id']}}">
        
        </form>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form action="/logout" method="POST">
              @csrf
              <button class="btn btn-danger">logout</button>
        
             </form>
        </div>
      </div>
    </div>
  </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr> 
                      <th>options</th>
                      <th>Id</th>
                      <th>name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>detach</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>options</th>
                      <th>Id</th>
                      <th>name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>detach</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      {{-- @if(Session::get('message'))
                      <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
                      @endif --}}
                      @foreach($roles as $role)
                    <tr>
                      <td><input type="checkbox"
                        {{-- @foreach($user->roles as $user_role)
                              @if($user_role->slug == $role->slug)
                              checked 
                              @endif
                        @endforeach --}}
                        ></td>
                      <td>{{$role->id}}</td>
                      <td>{{$role->name}}</td>
                      <td>{{$role->slug}}</td>
                      <td><button class="btn btn-primary">Attach</button></td>
                      <td><button class="btn btn-danger">Detach</button></td>
                    </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
</x-admin-master>