@extends('layouts.default')

@section('content')

<table border="1">
	<tr>
<th>Name
</th>
<th>Email
	</th>
	<th>Gender
		</th>
		<th>Image</th>
		<th>Action</th>
</tr>
@foreach($user as $users)

<tr>
	<td>    {{$users->name}}</td>
	<td>{{$users->email}}</td>

	<td>{{$users->gender}}</td>

	<td>  <img src="{{ asset('uploads/'.$users->image) }}" width="150px" height="150px"></td>
	<td> <a href="{{ route('user.edit',['id'=>$users->id]) }}" class = "btn btn-info">Edit</a></td>
    <td><a href="{{ route('user.destroy',['id'=>$users->id]) }}" class = "btn btn-danger">Delete</a></td>
	</tr>

   
@endforeach

</table>
@endsection