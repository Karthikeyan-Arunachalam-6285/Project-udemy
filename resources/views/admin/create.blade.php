<x-admin-master>

@section('content')
<h1 style=" text-align: center;">Create a post</h1>
 
     
<form   method="POST" action="/admin/posts" enctype="multipart/form-data">
    @csrf
     @if(Session::get('message'))
     <div class="alert alert-success"  role="alert">{{Session::get('message')}}</div>
     @endif
    <div class="form-group">
        <label   for="title">Title</label>
        <div class="col-md-4">
            <input type="text" name="title"id="title" placeholder="Enter Title" class="form-control"/>
            <span style="color:red">@error('title'){{$message}}@enderror</span>
         </div>
    </div>
    <div class="form-group">
        <label   for="file">File</label>
        <div class="col-md-4">
            <input type="file" id="post_image" name="post_image"  class="form-control-file"/>
            <span style="color:red">@error('post_image'){{$message}}@enderror</span>
        </div>
    </div>
    <div class="form-group">
            <div class="form-group">
                <label for="textarea">Text</label>
                <div class="col-md-4">
                <textarea id="body" class="form-control" name="body" rows="3"></textarea>
                <span style="color:red">@error('body'){{$message}}@enderror</span>
                </div>
            </div>
    </div>
   
       <input type="Submit" class="btn btn-primary">
    
</form>
@endsection

</x-admin-master>