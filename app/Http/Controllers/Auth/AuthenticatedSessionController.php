<?php

namespace App\Http\Controllers\Auth;

use App\Models\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\members;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;


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
        // Check the form has been correctly filled
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator,
            ]);
        }

        // If data are OK, check if a user with this email exists already
        $user = User::where('email', $request->email)->with(['members'=> function($q) {
            $q->where('currently_active', true);
        }])->first();

        // Check if we found a user and password matches
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 401,
                'message' => ' e-mail ou mot de passe incorrect',
            ]);
        }

        // Generate the unique session token
        $token = $user->createToken($user->email . '_token')->plainTextToken;

        return response()->json([
            'status' => 200,
            "user" => $user,
            'token' => $token,
            'message' => 'Connexion réussie',
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        //  Auth::guard('web')->logout();

        //  $request->session()->invalidate();

        // $request->session()->regenerateToken();
        // $request->user()->tokens()->delete();

         return response()->json([
            'status' =>200,
            'message' =>'vous vous êtes déconnecté de votre compte avec succès '
         ]);


       

    }
}
