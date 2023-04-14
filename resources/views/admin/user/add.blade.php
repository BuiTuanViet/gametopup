@extends('admin.master.layout')

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Thêm mới người dùng</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('user.store')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tên</label>
                            <input name='name' type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tên</label>
                            <input name='email' type="text" class="form-control">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phân quyền</label>
                            <select id="role-select" class="form-control" name="role">
                                @foreach(App\Models\Role::get() as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Mức lương (VND)</label>
                            <input name='salary' type="number" class="form-control"">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <div class="row">
                                <label class="col-sm-4 ">Mật Khẩu</label>
                            </div>
                            <input name='password' type="text" class="form-control" placeholder="****************" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-success px-5">Lưu thông tin </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')

@endsection
