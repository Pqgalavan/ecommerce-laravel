
@extends('inc.front')

@section('title')
    Welcome To ecommerce
@endsection

<style>

body {
    background: #ffc107;
    font-family: Arial, Helvetica, sans-serif
}

.container {
    background: #fff !important;
    border: none;
    border-radius: none
}

.abc {
    padding-left: 40px
}

.pqr {
    padding-right: 70px;
    padding-top: 14px
}

.para {
    float: right;
    margin-right: 0;
    padding-left: 80%;
    top: 0
}

.fa-star {
    color: yellow
}

li {
    list-style: none;
    line-height: 50px;
    color: #000
}

.col-md-2 {
    padding-bottom: 20px;
    font-weight: bold
}

.col-md-2 a {
    text-decoration: none;
    color: #000
}

.col-md-2.mio {
    font-size: 12px;
    padding-top: 7px
}

.des::after {
    content: '.';
    font-size: 0;
    display: block;
    border-radius: 20px;
    height: 6px;
    width: 55%;
    background: yellow;
    margin: 14px 0
}
#btn{
    margin-left: 615%;
}

.r4 {
    padding-left: 25px
}



@media screen and (max-width: 770px) {
    .container {
        width: 98%;
        display: flex;
        flex-flow: column;
        text-align: center
    }

    .des::after {
        content: '.';
        font-size: 0;
        display: block;
        border-radius: 20px;
        height: 6px;
        width: 35%;
        background: yellow;
        margin: 10px auto
    }

    .pqr {
        text-align: center;
        margin: 0 30px
    }

    .para {
        text-align: center;
        padding-left: 90px;
        padding-top: 10px
    }

    .klo {
        display: flex;
        text-align: center;
        margin: 0 auto;
        margin-right: 40px
    }
    #btn{
        margin-left: 0% !important;
    }
}

</style>

@section('content')

<div class="container py-4 my-4 mx-auto d-flex flex-column">
    <div class="header">
        <div class="row r1">
            @foreach ($product as $item )
            <div class="col-md-9 abc">
                <h1>{{$item->name}}</h1>
            </div>
            {{-- <div class="col-md-3 text-right pqr"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
            <p class="text-right para">Based on 250 Review</p> --}}
        </div>
    </div>
    <div class="container-body mt-4">

        <div class="row r3">
            <div class="col-md-5 p-0 klo">
                <ul>



                    <li>100% Quality</li>
                    <li>Free Shipping</li>
                    <li>Easy Returns</li>
                    <li>12 Months Warranty</li>
                  <li>{{$item->name}}</li>
                  <li>{{$item->small_description}}</li>
                  <li>{{$item->description}}</li>
                  <li><s>{{$item->original_price}}</s></li>
                  <li>{{$item->selling_price}}</li>

                </ul>
            </div>
            <div class="col-md-7"> <img src="{{asset('uploads/product/'.$item->image)}}"  width="50%" height="95%"> </div>
        </div>
        @endforeach
    </div>
    <div class="footer d-flex flex-column mt-5">
        <div class="row ">
            {{-- <div class="col-md-2 myt des"><a href="#">Description</a></div> --}}
            {{-- <div class="col-md-2 myt "><a href="#">Review</a></div> --}}

            <div class="col-md-2 myt "><a href="{{url('addcart/'.$item->id)}}"  id="btn" class="btn btn-outline-warning">ADD TO CART</a></div>
        </div>
    </div>
</div>

@endsection
