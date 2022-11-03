<?php

namespace App\Http\Controllers\Auth;

use App\Models\user;
use App\Models\members;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
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
  {
    $validator = Validator::make($request->all(), [
      'first_name' => 'required',
      'last_name' => 'required',
      'birthdate' => 'date_format:Y-m-d|before:today|nullable',

      'phone' =>  'required|numeric|digits:10',
      'email' => 'required|email|unique:users',
      'adresse' => 'required',
      'city' => 'required',
      'code_postal' => 'required',
      //  'currently_active'=>'required',
      //  'is_sideal'=>'required',
      //  'is_adult'=>'required',
      // 'user_id' => 'required',
      'password' => 'required|min:8',

    ]);

    if ($validator->fails()) {
      return response()->json([
        'validation_errors' => $validator->errors(),

      ]);
    } else {
      $members = user::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);

      members::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'birthdate' => $request->birthdate,
        'phone' => $request->phone,
        'adresse' => $request->adresse,
        'city' => $request->city,
        'code_postal' => $request->code_postal,
        'email' => $request->email,
        'user_id' => $members->id,
      ]);


      $token = $members->createToken($members->email . '_token')->plainTextToken;

      return response()->json([
        'status' => 200,
        'memberemails' => $members->email,
        'token' => $token,
        'message' => 'registered successfully'

      ]);
    }
  }
}
