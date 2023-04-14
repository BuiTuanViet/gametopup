@extends('admin.master.layout')

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa thông tin : {{ $user->email }}</h3>
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
            <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tên</label>
                            <input name='name' type="text" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tên</label>
                            <input name='email' type="text" class="form-control" value="{{ $user->email }}">
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
                            <label>Mức lương</label>
                            <input name='salary' type="number" class="form-control" value="{{ $user->salary }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <div class="row">
                                <label class="col-sm-4 ">Mật Khẩu</label>
                                <p class="col-sm-8 mb-0">
                                    <input id="change-password" class="form-check-input" type="checkbox">
                                    <label class="form-check-label">Tick nếu bạn muốn thay đổi mật khẩu</label>
                                </p>
                            </div>
                            <input name='password' type="text" class="form-control" placeholder="****************">
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
    <script>
        $(document).ready(function () {
            $('select[name="role"]').val("{{ $user->role_id }}")
            $('input[name="password"]').attr('disabled', 'disabled')

            $('input#change-password').click(function () {
                if ($('input[name="password"]').prop('disabled')) {
                    $('input[name="password"]').removeAttr("disabled");
                } else {
                    $('input[name="password"]').attr('disabled', 'disabled')
                }
            })
        })
    </script>
@endsection
