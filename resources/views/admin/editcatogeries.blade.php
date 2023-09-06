@extends('admin.admin');




@section('content')
<div class="card">
    <div class="card-header">
        Edit Category
    </div>
    <div class="card-body">
        <form action="{{ route('update.category', ['id' => $editcat->id]) }}"method="POST" enctype="multipart/form-data">
@csrf
@method('PUT');
        <div class="row">
            <div class="col-md-6 mb-3">
<label for="">Name:</label>
<input type="text" class="form-control" name="name" value="{{$editcat->name}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Slug:</label>
                <input type="text" class="form-control" name="slug" value="{{$editcat->slug}}">
                            </div>
               <div class="col-md-6 mb-3">
                    <label for="">Description:</label>
                        <input type="text" class="form-control" name="description" value="{{$editcat->description}}">
                </div>
                <div class="col-md-6 mb-3">
                      <label for="">Status:</label>
                         <input type="checkbox" name="status" {{$editcat->status==1?'checked':''}}>

                            <label for="">Popular:</label>
                 <input type="checkbox" name="popular" {{$editcat->popular==1?'checked':''}}">
                 </div>
                 <div class="col-md-12 mb-3">
                      <label for="">Meta Title:</label>
                     <input type="text" class="form-control" name="meta_title"  value="{{$editcat->meta_title}}">
                   </div>
                   <div class="col-md-12 mb-3">
                    <label for="">Meta Description:</label>
                      <input type="text" class="form-control" name="meta_descrip"  value="{{$editcat->meta_descrip}}">
                    </div>
                  <div class="col-md-12 mb-3">
                         <label for="">Meta Keywords:</label>
                        <input type="text" class="form-control" name="meta_keywords"  value="{{$editcat->meta_keywords}}">
                    </div>
                    <div>
                    <img src="{{asset('uploads/catogery/'.$editcat->image.'')}}"  style="width:200px">
                </div>
                       <input type="file" name="image" >
                     <div class="col-md-12 mx-4">
                       <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
        </div>


        </form>
    </div>
</div>



@endsection
