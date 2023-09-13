@extends('admin.admin')

@section('content')





<div class="container">
    <h2>Order Items</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> Product Name</th>
                    <th>Qty</th>
                    <th>Amount</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)


                <tr>


                    <td>{{$item->get_product->name}}</td>
                    <td>{{$item->qty}}</td>
                     <td>{{$item->amount}}</td>

                 </tr>
                @endforeach

            </tbody>
        </table>
    </div>
<h2>Total Amount : {{$item->total_amount}}</h2>
@endsection
