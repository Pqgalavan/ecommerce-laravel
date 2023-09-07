@extends('inc.front');


@section('content')

<div class="container">
    <h2>Your Orders</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> Product Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($myorder as $item)


                <tr>
                    <td>{{$item->get_product->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->amount}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
