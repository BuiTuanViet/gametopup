@extends('admin.master.layout')

@section('content')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">List User</h3>
            <a href="{{ route('setting.create') }}" class="float-right btn btn-success text-white"> Thêm mới</a>
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
                    <th>Title</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Thời gian nghỉ</th>
                    <th>Active</th>
                    <th>Địa chỉ ip</th>
                    <th style="width: 40px">Cài đặt</th>
                </tr>
                </thead>
                <tbody>
                @foreach($settings as $index => $setting)
                    <tr>
                        <td>{{ $index }}</td>
                        <td>{{ $setting->title }}</td>
                        <td><span class="badge bg-danger">  {{ $setting->time_start }}</span></td>
                        <td><span class="badge bg-primary">{{ $setting->time_out }}</span></td>
                        <td><span class="badge bg-primary">{{ $setting->breck_time }}</span></td>
                        <td class="text-center">
                            @if($setting->active == 1 )
                                <i class="fa fa-check-circle text-blue"></i>
                            @else
                                <i class="fa fa-check-circle" onclick="changeActive(this);" id="{{ $setting->id }}"></i>
                            @endif
                        </td>
                        <td>{{ $setting->ip_address }}</td>

                        <td>
                            <a href="{{ route('setting.edit', ['setting' => $setting->id]) }}" title="Chỉnh sửa">
                                <button class="btn btn-primary"><i class="fa fa-pencil-alt"></i></button>
                            </a>
                            <a onclick="deleteItem(this);"
                               url="{{ route('setting.destroy', ['setting' => $setting->id]) }}" title="Xóa">
                                <button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function changeActive(e) {
            let id = $(e).attr('id')
            if (confirm('Bạn có muốn sử dụng thời gian này hay không ?')) {
                $.ajax({
                    type: "get",
                    url: 'setting/'+ id +'/update-active',
                    data : []
                })
                    .done(function (data) {
                        console.log(data)
                        if(data){
                            location.reload()
                        }
                    })
                    .fail(function () {
                        alert("error");
                    })
            }
        }
    </script>
@endsection
