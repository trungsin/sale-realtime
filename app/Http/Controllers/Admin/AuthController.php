<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers\Backend
 */
class AuthController extends Controller
{
    /**
     * Function constructor
     *
     * @return mixed
     */
    public function __construct()
    {
    }

    /**
     * Function login
     *
     * @return view
     */
    public function login()
    {
        if (Auth::user()) {
            return redirect()->route('dashboard.index');
        }
        return view('admin.auth.login');
    }

    /**
     * Function authenticate
     *
     * @return mixed
     */
    public function authenticate(UserLoginRequest $request)
    {
        $input = $request->only('email', 'password');
        Auth::attempt($input);
        if (!Auth::attempt($input)) {
            return redirect()->route('login')->with('errorMessage',
            'Login is failed because the email or password supplied were not corrected');
        }
        return redirect()->route('dashboard.index')->with('successMessage', 'Login is successful.');
    }

    /**
     * Function authenticate
     *
     * @return mixed
     */
    public function logout(Request $request)
    {
        if (! Auth::guard('admin')->logout()) {
            return redirect()->back()->with('messageError', 'Logout is failed');
        }
        return redirect()->route('login');
    }

    /**
     * Update information when login
     *
     * @param number $id
     * @param array $input
     *
     */
    public function update($id, $input)
    {

    }
}
