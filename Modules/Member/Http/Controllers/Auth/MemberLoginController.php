<?php

namespace Modules\Member\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Modules\Member\Entities\Member as Repository;
use Modules\Member\Http\Requests\MemberLoginRequest;

class MemberLoginController extends Controller
{
    protected $repository;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Repository $repository)
    {
        $this->middleware('guest:member')->except('logout');

        $this->repository = $repository;
    }

    public function login(MemberLoginRequest $request)
    {
        $request = $request->only('username', 'password');
        
        if (Auth::guard('member')->attempt($request)) {
            return redirect()->intended(route('member.household.index'));
        }

        return redirect()->back()->withInput($request);
    }

    public function logout(Request $request)
    {
        Auth::guard('member')->logout();

        return redirect()->route('home.index');
    }
}
