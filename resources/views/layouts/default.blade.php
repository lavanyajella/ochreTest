<html>
    <head>
        <title>Task('title')</title>

         <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            .headerDiv{

            	float:right;
            	display: table-cell;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>

 

    </head>
    
    <body>

<div class="headerDiv">
	<table><tr><td>
        @if(Session::has('login'))
   
        <a href="{{ route('user.logout') }}">Logout</a>

         @else
         <a href="{{ route('user.login') }}">Login</a>
    @endif
</td>
       <td> <a href="{{ route('user.create') }}">Register</a></td>
               <td> <a href="{{ route('user.index') }}">Home</a></td>
            </table>
       </div> 
        @section('sidebar')

        @show

        <div class="container">
            @yield('content')
        </div>

         @if(session()->has('recordstatus'))
          {!! session('recordstatus') !!}
         @endif 
   </body>
</html>