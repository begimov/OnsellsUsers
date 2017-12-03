<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    protected function authenticated(Request $request, $user)
    {
        $prevViewedPromotionUrl = session('prevViewedPromotionUrl');
        return $prevViewedPromotionUrl ? redirect($prevViewedPromotionUrl) : redirect('/');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
        $previousUrl = url()->previous();
        
        if (preg_match("/promotions/", $previousUrl)) {
            session(['prevViewedPromotionUrl' => $previousUrl]);
        }
    }
}
