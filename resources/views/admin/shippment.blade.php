@extends('admin.admin')

@section('content')


<div class="container">
<h2>Shippment</h2>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> User Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Phone Number</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shippment as $item)


            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->address}}</td>
                 <td>{{$item->city}}</td>
                 <td>{{$item->state}}</td>
                 <td>{{$item->phone_number}}</td>
                 <td><a href="{{url('order/'.$item->order_id)}}">Shipping Items</a></td>
             </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
