@extends('layouts.default')

<hr>
@section('content')
<p>Welcome {{$user->name}}</p>

<a href="{{route('user.all')}}">View all users</a>
<table border =1>

	<tr>
{{$user->email}}
	</tr>
	<tr>
		{{$user->gender}}
	</tr>
	<tr>
		{{$user->role}}
	</tr>
</table>
@endsection