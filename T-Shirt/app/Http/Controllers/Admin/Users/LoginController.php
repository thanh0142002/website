<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', ['title' => 'Đăng nhập hệ thống']);
    }

    // public function checkUserType(){
    //     if(!Auth::user()){
    //         return redirect()->route('login');
    //     }
    //     if(Auth::user()->role === 'admin'){
    //         return redirect()->route('admin');
    //     }
    //     if(Auth::user()->role === 'customer'){
    //         return redirect()->route('us');
    //     }
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 1) {
                return redirect()->route('user');
            }
            return redirect()->route('admin');
        }
        $request->session()->flash('error', 'Email hoặc Password của bạn không đúng!');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
