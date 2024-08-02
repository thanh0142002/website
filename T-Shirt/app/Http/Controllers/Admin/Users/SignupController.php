<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view('admin.users.signup', ['title' => 'Đăng nhập hệ thống']);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users|email:filter',
                'password' => 'required|min:8|confirmed',
            ],
            [
                'name.required' => 'Tên phải có',
                'email.required' => 'Email phải có',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Mật khẩu phải có',
                'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
                'password.confirmed' => 'Mật khẩu xác nhận không khớp',
            ]);

        $user_new = new User();
        $user_new->name = $data['name'];
        $user_new->email = $data['email'];
        $user_new->password = Hash::make($data['password']);
        $user_new->save();
    
        return redirect()->route('user')->with('success', 'Tạo tài khoản thành công');
    }
}
