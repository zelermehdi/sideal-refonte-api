<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\members;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    { $validator = Validator::make($request->all(),[
         'first_name' =>'required',
         'last_name'=>'required',
         'birthdate'=>'required',
         'phone'=>'required',
        'adresse'=>'required',
         'city'=>'required',
         'code_postal'=>'required',
        'email'=>'required',
        
        // 'password' => 'required|min:5',
    
      ]);
      if($validator->fails())
      {
        return response()->json([
            'validation_errors' =>$validator,
        ]);
      }else{
        $members=members::create([
             'first_name' =>$request->first_name,
             'last_name'=>$request->last_name,
             'birthdate'=>$request->birthdate,
             'phone'=>$request->phone,
             'adresse'=>$request->adresse,
             'city'=>$request->city,
             'code_postal'=>$request->code_postal,
            'email'=>$request->email,
            // 'password'=>$request->password,
    
        ]);
        $token=$members->createToken($members->email. '_token')->plainTextToken;
    
        return response()->json([
            'status' =>200,
            'memberemails' =>$members->email,
            'token'=>$token,
            'message'=>'registered successfully'
            
        ]);
      }
    }
    }

