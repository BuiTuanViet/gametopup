<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepositoryInterface->getWithRole()->get();

        return view('admin.user.list', compact('users'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $userData = [
            'name' => $request['name'],
            'email' => $request['email'],
            'role_id' => $request['role'],
            'salary' => $request['salary'],
            'password' => $request['password']
        ];

        $this->userRepositoryInterface->store($userData);

        return redirect(route('user.index'))->with('success', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepositoryInterface->get($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $userData = [
            'name' => $request['name'],
            'email' => $request['email'],
            'role_id' => $request['role'],
            'salary' => $request['salary'],
        ];

        if ($request['password']) {
            $userData['password'] = $request['password'];
        }

        $saveUser = $this->userRepositoryInterface->update($id, $userData);

        return redirect(route('user.index'))->with('success', 'Lưu dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepositoryInterface->destroy($id);

        return redirect(route('user.index'))->with('success', 'Xóa thành công');
    }
}
