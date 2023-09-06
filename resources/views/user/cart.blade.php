@extends('inc.front')




<style>
    .gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
</style>
@section('content')
<section class="h-100 gradient-custom">
    <div class="container py-5">
      <div class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Cart - 2 items</h5>
            </div>

            <div class="card-body">



              <!-- Single item -->
              <div class="row">
                @php
                  $x=0;
                @endphp
                @foreach ($cart as $item )
            @php



              ++$x;
            @endphp

                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                  <!-- Image -->
                  <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                    <img src="{{asset('uploads/product/'.$item->product_detail->image)}}"
                      class="w-100" alt="Blue Jeans Jacket" />
                    <a href="#!">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                  </div>
                  <!-- Image -->
                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                  <!-- Data -->
                  <p><strong>{{$item->product_detail->name}}</strong></p>
                  <p>Description: {{$item->product_detail->description}}</p>
                  <p>Price: {{$item->product_detail->original_price}}</p>

                  <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                    title="Move to the wish list">
                   Delete
                  </button>
                  <!-- Data -->
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                  <!-- Quantity -->
                  <div class="d-flex mb-4" style="max-width: 300px">
                    <button class="btn btn-primary px-3 me-2"
                      onclick="decrement({{$x}})">
                      -
                    </button>

                    <div class="form-outline">
                        <input type="hidden"  id="pid{{$x}}" value="{{$item->product_id}}">
                      <input id="form1{{$x}}" min="0" name="quantity" value="1" type="number" class="form-control" oninput="getvalue({{$x}})" />
                      <input type="hidden" id="oprice{{$x}}" value="{{$item->product_detail->original_price}}">
                      <label class="form-label" for="form1">Quantity</label>
                    </div>

                    <button class="btn btn-primary px-3 ms-2"
                      onclick="increment({{$x}})">
                   +
                    </button>
                  </div>
                  <!-- Quantity -->

                  <!-- Price -->
                  <p class="text-start text-md-center">
                    <strong id="priceval{{$x}}">{{$item->product_detail->original_price}}</strong>
                    <input type="hidden"  id="priceval2{{$x}}">
                  </p>
                  <!-- Price -->

                </div>
                @endforeach
                <input type="hidden" id="xval"   value="{{$x}}">
              </div>
              <!-- Single item -->


              <hr class="my-4" />




              <!-- Single item -->
            </div>
          </div>


        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Summary</h5>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li
                  class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  Products
                  <span>{{$x}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                  Shipping
                  <span>Gratis</span>
                </li>
                <li
                  class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                  <div>
                    <strong>Total amount</strong>
                    <strong>
                      <p class="mb-0">(including VAT)</p>
                    </strong>
                  </div>
                  <span><strong id="totalprice"></strong></span>
                  <input type="hidden" id="ttprice">
                </li>
              </ul>
              <a href="{{url('checkoutfinal')}}">
              <button type="button"  class="btn btn-primary btn-lg btn-block">
                Go to checkout
              </button>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection



<script>
  function getvalue(x){
var pid = $('#pid'+x).val();
  var qty =  $('#form1'+x).val();
  if(qty <= 0){

    alert('Qty not will be less then zero');
    qty.val(0);
      return;

  }
  var price = $('#oprice'+x).val();
  var full_price = qty * price ;
  $('#priceval'+x).text(full_price);
  $('#priceval2'+x).val(full_price);

$.ajax({
                url: "{{ route('qty_update') }}",
                type: "POST",
                data:{'productid':pid,'qty':qty, '_token': "{{ csrf_token() }}"},
                success:function(html){
                    console.log('successfull');
                }

            });

totalqty();



  }


  function decrement(x){
    var qty =  $('#form1'+x).val();
    if(qty <= 0){
      alert('Qty not will be less then zero');
      qty.val(0);
      return;
    }
    $('#form1'+x).val(--qty);
    getvalue(x);

  }

  function increment(x){
    var qty =  $('#form1'+x).val();
    $('#form1'+x).val(++qty);
    getvalue(x);


  }
  function totalqty(){
var xval = $('#xval').val();
var destination = 0;
for(var x=1;x<=xval;x++){

var price = $('#priceval'+x).text();

destination += parseFloat(price);
}
$('#totalprice').text(destination);
$('#ttprice').val(destination);

$.ajax({
                url: "{{ route('totalqty_update') }}",
                type: "POST",
                data:{'total_amount':destination, '_token': "{{ csrf_token() }}"},
                success:function(html){
                    console.log('successfull');
                }

            });


  }
</script>
