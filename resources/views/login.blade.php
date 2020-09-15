@extends('layouts.default')

@section('title', 'Page Title')

@section('content')

        <div class="container">
            <div class="content">
               <div>


 <form action="{{ route('user.dologin') }}" method="post">
   {{ csrf_field() }}
    <div class="form-group">
        <label for="name"><b>User Email  </b></label>
        <input type="text" class="form-control" id="userEmail"  name="email" >
    </div>
    <div class="form-group">
        <label for="email"><b>User Password</b></label>
        <input type="password" class="form-control" id="userPassword" name="password" >
    </div>

     <button type="submit" class="btn btn-primary">Submit</button>

</form>
                </div>
            </div>
        </div>
@endsection
