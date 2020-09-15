<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Images;
use Image;

class UserController extends Controller
{
    
 public function index()
  {

    	return view('welcomepage');


  }

    //for  login form view
 public function login()
  {

      return view('login');

  }

//To authenticate
  public function dologin(Request $request)
  {

     $email = $request->input('email');
     $password = $request->input('password');

   $user = User::where('email', '=', $email)->first();
   $role= $user->role;
  //echo $role;
  //print_r($user);exit;
   if (!$user) {
        return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
     }

     if (!Hash::check($password, $user->password)) {
        return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
     }

   if(response()->json('success'))
   {
      $request->session()->flash('status', 'Task was successful!');

      //$request->session()->put('role',$user->role );
      Session::put('login', 'yes');
      if($role=='admin'){
      return view('index', compact('user',$user));
      }
      else
      {
       return view('test', compact('user',$user));
      }
     //echo 'Logged in successfully';
    }

   // print_r($userpwd);die;

     
 }

 //To logout
 public function logout(){

  //session_unset('login');
  Session::forget('login');
       
    return redirect('/');
 }

//To list all users for a admin
 public function all()
 {
  $user = User::where('role', '=', 'user')->get();
   return view('showall',compact('user',$user));

 }
 //To delete a record
   public function destroy($id) 
   {

    $blog = User::find($id);
    //print_r($blog);
    $blog->delete();

    Session::flash('recordstatus', 'deleted successfully!');
    return redirect('/');
    }
   //To open create form
    public function create()
    {
        //
        return view('create');

    }

    //To store data into database
    public function store(Request $request)
    {
     //  print_r($request);exit;
         if($request->hasFile('image')) {
            $file = $request->file('image');

            $name = time().'.'.$file->getClientOriginalExtension();
           //echo $name;die;
           // $image['filePath'] = $name;
           // $path = $file->move('uploads', $name);
            $destinationPath = public_path('\uploads');
            $path=  $file->move($destinationPath, $name);
          
        }
      $request->image = $name;
      $pwd=$request->password;
      $pwd = Hash::make($pwd);

     // echo $pwd;die;
        $users = User::create(['name' => $request->username,'email' => $request->email,'password' => $pwd,'gender' => $request->gender,'role' => $request->role,'image' => $request->image]);
        
        $msg ='Record created successfully';
        return view('create');

}
//To show specific user
  public function show($id)
    {
        $users = User::find($id);
        return view('show',compact('users',$users));

    }


    //updating specific record
  public function update(Request $request,$id)
    {

            $img_name = $request->hidden_image;
         $image = $request->file('image');

        if($image != '')
        {
        

            $img_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $img_name);
        }
        
        $form_data = array(
            'name'       =>   $request->username,
            'email'        =>   $request->email,
            'gender'        =>  $request->gender,
            'image'            =>   $img_name
        );

        User::whereId($id)->update($form_data);
        

        Session::flash('recordstatus', 'updated successfully!');

       // echo 'Record updated successfully';

    return redirect('/');


    }
//To edit specific record details
    public function edit($id)
    {
     //echo "hello";die;
        $users = user::find($id);
        return view('edit',compact('users',$users));
    }

}