<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;
    public function redirectTo()
    {
        if(Auth::user()->status == 1){
            switch(Auth::user()->role){
                case 1:
                    $this->redirectTo = '/admin';
                    return $this->redirectTo;
                    break;
                case 2:
                    // $this->redirectTo = '/operator';
                    $this->redirectTo = '/admin';
                    return $this->redirectTo;
                    break;
                default:
                    $this->redirectTo = '/login';
                    return $this->redirectTo;
            }
        }else{
            Auth::logout();
            $this->redirectTo = '/login';
            return $this->redirectTo;
        }
        // return $next($request);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
