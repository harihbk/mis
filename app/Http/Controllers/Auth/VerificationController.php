<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use App\Models\User;

use Auth;
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

   // use VerifiesEmails;

    use VerifiesEmails {
        verify as parentVerify;
    }


    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

      //  $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');

    }

    protected function verificationUrl($notifiable) {
 echo "dfg";
 exit();
        Auth::logout();
  return redirect('/login');
        // return URL::temporarySignedRoute(
        //     'verification.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
        // ).'&redirectTo=https://root.loc/whatever';
    }



}
