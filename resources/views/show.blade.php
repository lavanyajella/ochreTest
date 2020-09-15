@extends('layouts.default')

@section('content')
<h1>Showing User {{ $users->name }}</h1>
    <div class="jumbotron text-center">
        <p>
            <strong>User Name:</strong> {{ $users->name }}<br>
            <strong>Email:</strong> {{ $users->email }}
        </p>
    </div>


      {{$users->name}}<br>
       {{$users->email}}<br>
  
       {{$users->gender}}<br>

       {{$users->image}}<br>
     <img src="{{ asset('uploads/'.$users->image) }}" width="150px" height="150px"><br>
        
    </tr>
    <a href="{{ route('user.edit',['id'=>$users->id]) }}">Edit</a>
</div>
@endsection
