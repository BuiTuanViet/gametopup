<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePassword;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login(Request $request)
    {
        $data = [
            'user_name' => $request['user_name'],
            'password' => $request['password'],
        ];

        if (Auth::attempt($data)) {
            dd(1);
            return redirect(route('top'));
        }else{
            dd('login k thành công');
        }
    }

    public function getRegister(Request $request)
    {
        return view('site.auth.register');
    }

    public function postRegister(UserRequest $request)
    {
        $userModel = new User();
        $data = [
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'phone' => $request->phone,
            'rate' => $request->rate,
        ];

        $id = $userModel->insertGetId($data);
        dd($id);
    }

    public function logOut()
    {
        Auth::logout();

        return redirect('/');
    }

    public function changePassword(UpdatePassword $request)
    {

        $user = Auth::user();

        if (Hash::check($request['old-pass'], $user->password)) {
            $this->userRepository->update($user->id, [
                'password' => $request['new-pass']
            ]);

            return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
        }

        return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = [
            'name' => $request['name']
        ];

        $this->userRepository->update($user->id, $data);

        return redirect()->back()->with('success', 'Đổi Tên thành công');

    }
}
