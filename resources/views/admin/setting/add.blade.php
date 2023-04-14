@extends('admin.master.layout')

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Thêm mới cài đặt</h3>
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
            <form method="POST" action="{{ route('setting.store')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tên</label>
                            <input name='title' type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Địa chỉ IP</label>
                            <input name='ip_address' type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Thời gian bắt đầu</label>
                            <input name='time_start' type="time" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Thời gian kết thúc</label>
                            <input name='time_out' type="time" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Thời gian nghỉ</label>
                            <input name='breck_time' type="number" class="form-control">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-success px-5">Lưu thông tin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')

@endsection
