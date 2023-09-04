@extends('admin.admin');

@section('content')


<table class="table">
    <thead>
        <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
        </tr>
    </thead>
<tbody>
    @foreach ($catogeries as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->description}}</td>
        <td><img src="{{asset('uploads/catogery/'.$item->image)}}" style="width: 200px"/></td>
        <td>
            <a href="{{url('edit_cat/'.$item->id.'')}}" class="btn btn-primary">Edit</a>
            <a href="{{url('dlt_cat/'.$item->id.'')}}" class="btn btn-danger">Delete</a>

    </tr>

    @endforeach
</tbody>
</table>


@endsection
