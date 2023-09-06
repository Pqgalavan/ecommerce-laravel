@extends('admin.admin');

@section('content')


<table class="table">
    <thead>
        <tr>
        <th>Name</th>
        <th>Catogery</th>
        <th>Image</th>
        <th>Action</th>
        </tr>
    </thead>
<tbody>
    @foreach ($product as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->cat->name}}</td>
        <td><img src="{{asset('uploads/product/'.$item->image)}}" style="width: 200px"/></td>
        <td>
            <a href="{{url('edit_pro/'.$item->id.'')}}" class="btn btn-primary">Edit</a>
            <a href="{{url('dlt_pro/'.$item->id.'')}}" class="btn btn-danger">Delete</a>

    </tr>

    @endforeach
</tbody>
</table>


@endsection
