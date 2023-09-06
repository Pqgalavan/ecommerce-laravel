@extends('inc.front')

@section('title')
    Welcome To ecommerce
@endsection


@section('content')



<div class="col-md-12" style="display:flex;justify-content:center ">
    @include('inc.slider')
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($product as $item)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{asset('uploads/product/'.$item->image)}}" style="object-fit:cover" alt="">
                    <div class="card-body">
                        <h5>{{ $item->name}}</h5>
                        <small class="float-start">{{$item->selling_price}}</small>
                        <small class="float-end"><s>{{$item->original_price}}</s></small>
                        <button style="float: right"><a href="{{url('get_product/'.$item->id)}}">View Product</a></button>
                    </div>

                </div>

            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
