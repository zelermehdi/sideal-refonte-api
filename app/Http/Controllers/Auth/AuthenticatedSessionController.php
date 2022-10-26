<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\user;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {









    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
      
        $validator = Validator::make($request->all(),[

            'email'=>'required',
            'password' => 'required',
        
          ]);
          
          if($validator->fails())
          {
            return response()->json([
                'validation_errors' =>$validator,
            ]);
          }else{
            $users = user::where('email',$request->email)->first();
            if(!$users || ! Hash::check($request->password,$users->password)){
                return response()->json([
                    'status' =>401,
                    'message'=>'invalid credentials',
                ]);
        
        
        
            }
            else{
                $token=$users->createToken($users->email. '_token')->plainTextToken;
        
        return response()->json([
            'status' =>200,
            'email'=>$users->email,
            'token'=>$token,
            'message'=>'registered successfully',
        ]);
        
        
        
            }
          
        
        
        
        
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



    public function register(request $request){
        
    }


}
