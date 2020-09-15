@extends('layouts.default')
<hr>

@section('content')
<p>Welcome {{$user->name}}</p>
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