<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminLoginController extends Controller
{
    protected $imageManager;

    public function __construct()
    {
        $this->imageManager = new ImageManager(new Driver());
    }
    public function index() {
        return view('admin.login');
    }

    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if ($validator->passes()) {
            // Now authenticate admin

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                $user = Auth::guard('admin')->user();

                if ($user->role == 'admin') {
                    // redirect user to dashboad
                    return redirect()->route('admin.dashboard');

                } else {

                    // logout current session and back to login page
                    Auth::guard('admin')->logout();
                    session()->flash('error','Either email/password is incorrect');
                    return redirect()->route('admin.login');
                }
            } else {
                session()->flash('error','Either email/password is incorrect');
                return redirect()->route('admin.login');
            }

        } else {
            // Redirect with errors
            return back()->withInput($request->only('email'))->withErrors($validator);
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
