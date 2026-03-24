<?php

namespace App\Http\Controllers;

use App\Http\Resources\userResours;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authoraisationController extends Controller
{
    public function signUp(Request $request){
      $validated= $request->validate([
         'name'=>'required|string|min:3|max:25',
         'email'=>'required|string|unique:users,email',
         'password'=>'required|confirmed|min:6',
       ]);
       $user=User::create([
        'name'=>$validated['name'],
        'email'=>$validated['email'],
        'password'=>Hash::make($validated['password']),
       ]);
      $token=  $user->createToken('auth_token')->plainTextToken;
      return response()->json([
        'secsses'=>true,
        'user'=>new userResours($user),
        'token'=>$token
      ]);
    }
   public function login(Request $request){
       $validated= $request->validate([
         'email'=>'required|string|unique:users,email',
         'password'=>'required|confirmed|min:6',
       ]);
     $userlogin=  User::where('email,',$validated['email']);
     if (!$userlogin||!Hash::check($validated['password'],$userlogin->password)) {
        return response()->json([
             'responces'=>'the email or pasword id worng'
        ]);
       
     }
     else {
          $token=  $userlogin->createToken('auth_token',['read-book','update-book','insert-book','delete-book','read-authore'])->plainTextToken;
            return response()->json([
        'secsses'=>true,
        'token'=>$token
            ]);
     }
   } 
  
   public function logOut(Request $request){

    if ($request->user() && $request->user()->currentAccessToken()) {
    $request->user()->currentAccessToken()->delete();
   }
    else{
           return response()->json([
        'user'=>'the user allready been deleted',
    ]);
    }
   

   }
}
