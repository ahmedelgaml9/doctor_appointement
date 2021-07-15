<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;

class UserController extends Controller
{
   
   public $successStatus = 200;
   

  public function login(Request $request)
    {
       
         if(Auth::attempt(['email' => $request->email , 'password' => $request->password ])){

            $user = Auth::user();

            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['id'] =  $user->id;
            $success['name'] =  $user->name;

           return response()->json(['success' => $success], $this->successStatus);
        }
           else{

            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }



    public function register(Request $request)
    {
          
    
        $validator = Validator::make($request->all(), [

             'email' => 'required|email|unique:users',
             'password' => 'required',
             'password_confirmation' => 'required|same:password',
             'name' => 'required',
             
         ]);
        
         if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
         }           

            $input = $request->all();
            $user = User::create($input);

            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            $success['id'] =  $user->id;
        
          return response()->json(['success'=>$success], $this->successStatus);
          
        
    }


}
