@extends('layouts.default')


@section('content')
<form action="{{ route('user.update',$users->id) }}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
    <div class="form-group">
        <label for="name">User Name</label>
        <input type="text" value="{{$users->name}}" class="form-control" id="userName"  name="username" >
    </div>
    <div class="form-group">
        <label for="email">User Email</label>
        <input type="text" value="{{$users->email}}" class="form-control" id="userEmail" name="email" >
    </div>

  <div class="form-group">
        <label for="gender">Gender</label>

             <input type="radio" class="form-control" name="gender" value="male"  {{ $users->gender == 'male' ? 'checked' : '' }} > Male<br>
             <input type="radio" class="form-control" name="gender" value="female"  {{ $users->gender == 'female' ? 'checked' : '' }}> Female<br>              
    </div>

  <div class="form-group">

       <label for="image">Select Profile Image</label>
  <input type="file" name="image" />
               <img src="{{ asset('uploads/'.$users->image) }}" width="150px" height="150px"/><br>
           </div>
                        <input type="hidden" name="hidden_image" value="{{ $users->image }}" />


   


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <input type="hidden" name="id" value = "{{$users->id}}">
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection