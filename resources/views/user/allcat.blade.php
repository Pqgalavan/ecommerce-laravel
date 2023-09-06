
@extends('inc.front')

@section('title')
    Welcome To ecommerce
@endsection


@section('content')



<div class="col-md-12" style="display:flex;justify-content:center ">

</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($cat as $item)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{asset('uploads/product/'.$item->image)}}" style="object-fit:cover" alt="">
                    <div class="card-body">
                        <h5>{{ $item->name}}</h5>
                <button><a href="{{url('get_product/'.$item->id)}}">View Product</a></button>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection

<style>
      <style>
        /* Custom CSS for the shopping card */
        .card {
            max-width: 300px; /* Adjust the maximum width as needed */
        }
        .card img {
            max-width: 100%;
            height: auto;
        }
    </style>

