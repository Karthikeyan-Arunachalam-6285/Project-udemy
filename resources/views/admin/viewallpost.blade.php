<x-admin-master>
   @section('content')
   <h1 class="h3 mb-4 text-gray-800">View all post</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Post Image</th>
              <th>Body</th>
              <th>Created date</th>
              <th>Updated date</th>
              <th>Edit</th>
              <th>Delete</th>
              

            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Post Image</th>
                <th>Body</th>
                <th>Created date</th>
                <th>Updated date</th>
                <th>Edit</th>
                <th>delete</th>
            </tr>
          </tfoot>
          <tbody>
              @if(Session::get('message'))
              <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
              @endif
              @foreach($posts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->title}}</td>
              <td>
                  <img height="30px;"src="{{$post->post_image}}" alt="">
              </td>
              <td>{{$post->body}}</td>
              <td>{{$post->created_at}}</td>
              <td>{{$post->created_at}}</td>
              <td> <a href="{{('admin/editpost')}}/{{$post->id}}"style="margin-left:10px;"class="fa fa-edit fa-2x"></a> </td>
              <td><a href="{{('delete')}}/{{$post->id}}" style="margin-left:10px;"class="fa fa-times fa-2x text-danger"></a>
              
              </td>

            </tr>
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

   @endsection
   @section('scripts')
   <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
   @endsection
</x-admin-master>