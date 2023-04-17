@extends('site.master.layout')

@section('content')
    <style>
        .card-item{
            height: 200px;
            background: #9060d599;
            color: #fff;
        }
        .card-item i{
            font-size: 80px;
        }

        .card-body{
            text-align: center;
        }
        .card-body h4{
            font-weight: bold;
        }
    </style>
    <div class="main-panel">
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin tài khoản</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('update_user') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input type="text" class="form-control" disabled placeholder=""
                                                       value="{{ $user->user_name }}">
                                                @error('user_name')
                                                <p class="text-danger"><i>{{ $message }}</i></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Họ Tên</label>
                                                <input type="text" class="form-control" name="name" placeholder="Họ tên"
                                                       value="{{ $user->name }}">
                                                @error('name')
                                                <p class="text-danger"><i>{{ $message }}</i></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Số điện thoại</label>
                                                <input type="text" class="form-control" name="phone" placeholder="phone"
                                                       value="{{ $user->phone }}">
                                                @error('phone')
                                                <p class="text-danger"><i>{{ $message }}</i></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Mức quy đổi </label>
                                                <select class="select form-control" name="rate">
                                                    <option value="1" {{ $user->rate == 1 ? 'selected' :'' }}>1đ = 25.000đ</option>
                                                    <option value="2" {{ $user->rate == 2 ? 'selected' :'' }}>1đ = 50.000đ</option>
                                                    <option value="3" {{ $user->rate == 3 ? 'selected' :'' }}>1đ = 100.000đ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Thay đổi thông tin</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="">
                            <div class="card card-item">
                                <div class="card-body">
                                    <i class="fa fa-play-circle"></i>
                                    <h4>Vào đá gà SV3888</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('topup') }}">
                            <div class="card card-item">
                                <div class="card-body">
                                    <i class="fa fa-money"></i>
                                    <h4>Nạp tiền</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('withdraw') }}">
                            <div class="card card-item">
                                <div class="card-body">
                                    <i class="fa fa-credit-card"></i>
                                    <h4>Rút tiền</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('bank_user') }}">
                            <div class="card card-item">
                                <div class="card-body">
                                    <i class="fa fa-university"></i>
                                    <h4>Quản lý thẻ ngân hàng</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('promotion') }}">
                            <div class="card card-item">
                                <div class="card-body">
                                    <i class="fa fa-address-book"></i>
                                    <h4>Khuyến mãi</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('transactions') }}">
                            <div class="card card-item">
                                <div class="card-body">
                                    <i class="fa fa-bars"></i>
                                    <h4>Lịch sử giao dịch</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
