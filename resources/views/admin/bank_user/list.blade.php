@extends('admin.master.layout')

@section('content')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">List User</h3>
            <a href="{{ route('bank-user.create') }}" class="btn btn-success float-right">Thêm mới</a>
        </div>
        <div class="card-header">
            <form action="{{ route('bank-user.index') }}" method="get">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="user_name">Tên đăng nhập</label>
                        <input type="text" id="user_name" class="form-control" name="user_name" value="{{ request('user_name') }}">
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary"> Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>

    @if (session('success'))
            <div class="alert alert-success mx-2 mt-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>User Name</th>
                    <th>Mật khẩu</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Mức quy đổi</th>
                    <th>Phân loại</th>
                    <th>Trạng thái</th>
                    <th style="width: 150px">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ \Illuminate\Support\Facades\Crypt::decrypt($user->password) }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        {{ $user->phone }}
                    </td>
                    <td>
                        @switch($user->rate)
                            @case(1)
                            1đ = 25.000đ
                            @break
                            @case(2)
                            1đ = 50.000đ
                            @break
                            @case(3)
                            1đ = 100.000đ
                            @break
                        @endswitch
                    </td>
                    <td>
                        @switch($user->role)
                            @case(0)
                            Người dùng
                            @break
                            @case(1)
                            Admin
                            @break
                        @endswitch
                    </td>
                    <td>
                        @switch($user->status)
                            @case(0)
                            <span class="badge badge-warning">Chưa kích hoạt</span>
                            @break
                            @case(1)
                            <span class="badge badge-primary">Đã kích hoạt</span>
                            @break
                        @endswitch
                    </td>
                    <td style="width: 150px">
                        <a href="{{ route('user.edit', ['user' => $user->id]) }}" title="Chỉnh sửa">
                            <button class="btn btn-primary">
                                <i class="fa fa-pencil-alt"></i>
                            </button>
                        </a>
                        <a onclick="deleteItem(this);" url="{{ route('user.destroy', ['user' => $user->id]) }}" title="Xóa"><button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button></a>
                        @if($user->status == 0)
                        <a onclick="acceptItem(this);" url="{{ route('accept_user', ['id' => $user->id]) }}" title="Kích hoạt">
                            <button class="btn btn-success">
                                <i class="fa fa-angle-up"></i>
                            </button>
                        </a>
                        @else
                            <a onclick="acceptItem(this);" url="{{ route('accept_user', ['id' => $user->id]) }}" title="Hủy Kích hoạt">
                                <button class="btn btn-success">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </div>
@endsection
