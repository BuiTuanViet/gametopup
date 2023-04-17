<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = new User();
        if ($request->user_name){
            $users = $users->where('user_name', $request->user_name);
        }
        if ($request->status){
            $users = $users->where('status', $request->status);
        }
        if ($request->type){
            $users = $users->where('type', $request->type);
        }
        $users = $users->paginate(10);
        return view('admin.user.list')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
           $userModel = new User();
            $data = [
                'user_name' => $request->user_name,
                'password' => Crypt::encrypt($request->password),
                'name' => $request->name,
                'phone' => $request->phone,
                'rate' => $request->rate,
                'role' => $request->role,
                'created_at' => new \DateTime(),
            ];

            $id = $userModel->insertGetId($data);

            return redirect(route('user.index'))->with(['success', "Thêm mới thành công"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->rate = $request->rate;
        $user->role = $request->role;
        $user->save();

        return redirect(route('user.index'))->with(['success', "Cập nhật thành công"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->destroy($id);
        return redirect(route('user.index'))->with(['success', "Cập nhật thành công"]);

    }

    public function accept($id)
    {
        $user = User::find($id);
        $user->status = $user->status == 0 ? '1' : 0;
        $user->save();
        return redirect(route('user.index'))->with(['success', "Cập nhật thành công"]);
    }
}
