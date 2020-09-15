@extends('layouts.default')


@section('content')<h1>Register</h1>

<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Full 
        Name</label>
        <input type="text" class="form-control" id="userName"  name="username">
    </div>
    <div class="form-group">
        <label for="email">User Email</label>
        <input type="text" class="form-control" id="userEmail" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="userPassword" name="password">
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>

             <input type="radio" class="form-control" name="gender" value="male"> Male<br>
             <input type="radio" class="form-control" name="gender" value="female"> Female<br>              
    </div><br>
    <div class="form-group">
        <label for="role">User Role</label>

            <select name="role" id="role" class="form-control" required>
                 <option value="">Choose role</option>
                 <option value="admin">Admin</option>
                 <option value="user">User</option>                                                         
              </select> 

    </div>

<br>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control" id="userImage">

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection