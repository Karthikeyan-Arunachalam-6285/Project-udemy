<x-admin-master>

    @section('content')

    <h1>Users</h1>   
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Users</h6>
     </div>
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
               <th>Id</th>
               <th>username</th>
               <th>name</th>
               <th>avatar</th>
               <th>Created date</th>
               <th>Updated date</th>
               <th>Delete</th>
               
 
             </tr>
           </thead>
           <tfoot>
             <tr>
                <th>Id</th>
               <th>username</th>
               <th>name</th>
               <th>avatar</th>
               <th>Created date</th>
               <th>Updated date</th>
                 <th>delete</th>
             </tr>
           </tfoot>
           <tbody>
               @if(Session::get('message'))
               <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
               @endif
               @foreach($users as $user)
             <tr>
               <td>{{$user->id}}</td>
               <td>{{$user->username}}</td>
               <td>{{$user->name}}</td>
               <td>{{$user->avatar}}</td>
               <td>{{$user->created_at}}</td>
               <td>{{$user->updated_at}}</td>
               <td> 
                <a class="dropdown-item" style="margin-left:10px;"data-toggle="modal" data-target="#deleteModal">
                    <i class="fa fa-times fa-2x text-danger"></i>
                  </a>
                </td>
             </tr>
                 @endforeach
           </tbody>
         </table>
       </div>
     </div>
   </div>
   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Delete" below if you are ready to Delete record.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            
            <form action="{{('/admin/users/index')}}/{{$user->id}}" method="post">
              @csrf
              <button class="btn btn-danger">Delete</button>
          
             </form>
    @endsection
    @section('scripts')
    <!-- Page level plugins -->
   <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
 
   <!-- Page level custom scripts -->
   <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>