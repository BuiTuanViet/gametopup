@extends('admin.master.layout')

@section('content')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">List User</h3>
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
                    <th>Tên</th>
                    <th>Email</th>
                    <th style="width: 40px">Chức vụ</th>
                    <th style="width: 40px">Mức lương</th>
                    <th style="width: 40px">Cài đặt</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td><span class="badge bg-danger">  {{ $user->roles->name }}</span></td>
                    <td><span class="badge bg-primary">{{ number_format($user->salary) }} VND</span></td>
                    <td>
                        <a href="{{ route('user.edit', ['user' => $user->id]) }}" title="Chỉnh sửa"><button class="btn btn-primary"><i class="fa fa-pencil-alt"></i></button></a>
                        <a onclick="deleteItem(this);" url="{{ route('user.destroy', ['user' => $user->id]) }}" title="Xóa"><button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
