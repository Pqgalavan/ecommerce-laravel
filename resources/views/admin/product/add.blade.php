@extends('admin.admin');
@section('content')




<div class="card">
    <div class="card-header">
        Add Category
    </div>
    <div class="card-body">
        <form action="{{url('add_product')}}" method="POST" enctype="multipart/form-data">
@csrf
        <div class="row">

            <div class="col-md-12 mb-3">
                <select class="form-select form-select-lg" style="width: inherit" name="cate">
                @foreach ($catogeries as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>

                @endforeach
                  </select>
            </div>
            <div class="col-md-6 mb-3">
<label for="">Name:</label>
<input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Slug:</label>
                <input type="text" class="form-control" name="slug">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Small Description:</label>
                                    <input type="text" class="form-control" name="smalldescription">
                            </div>
               <div class="col-md-6 mb-3">
                    <label for="">Description:</label>
                        <input type="text" class="form-control" name="description">
                </div>



                 <div class="col-md-6 mb-3">
                    <label for="">Status:</label>
                       <input type="checkbox" name="status">

                          <label for="">Popular:</label>
               <input type="checkbox" name="popular">
               </div>

               <div class="col-md-12 mb-3">
                <label for="">Original Price:</label>
               <input type="text" class="form-control" name="originalprice">
             </div>

             <div class="col-md-12 mb-3">
                <label for="">Selling Price</label>
               <input type="text" class="form-control" name="sellingprice">
             </div>


                 <div class="col-md-12 mb-3">
                    <label for="">Qty:</label>
                   <input type="text" class="form-control" name="qty">
                 </div>
                 <div class="col-md-12 mb-3">
                    <label for="">Tax:</label>
                   <input type="text" class="form-control" name="tax">
                 </div>

                 <div class="col-md-12 mb-3">
                    <label for="">Trending</label>
                   <input type="text" class="form-control" name="trending">
                 </div>
                 <div class="col-md-12 mb-3">
                      <label for="">Meta Title:</label>
                     <input type="text" class="form-control" name="meta_title">
                   </div>
                   <div class="col-md-12 mb-3">
                    <label for="">Meta Description:</label>
                      <input type="text" class="form-control" name="meta_descrip">
                    </div>
                  <div class="col-md-12 mb-3">
                         <label for="">Meta Keywords:</label>
                        <input type="text" class="form-control" name="meta_keywords">
                    </div>
                       <input type="file" name="image" >
                     <div class="col-md-12 ">
                       <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
        </div>

        </form>
    </div>
</div>



@endsection













