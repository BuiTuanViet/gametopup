<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="{{ asset('assset/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('assset/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('assset/js/bootstrap.min.js') }}"></script>

    <style>
        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }
        .card-registration .select-arrow {
            top: 13px;
        }
    </style>
</head>
<body>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Đăng nhập </h3>
                        <form method="post" action="{{ route('post_login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="userName">Tên đăng nhập</label>
                                        <input type="text" id="userName" name="user_name" class="form-control" value="{{ old('user_name') ?? ''}}" />
                                        @error('user_name')
                                        <p class="text-danger"><i>{{ $message }}</i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="password">Mật khẩu</label>
                                        <input type="password" id="password" name="password" class="form-control" />
                                        @error('password')
                                        <p class="text-danger"><i>{{ $message }}</i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input class="btn btn-primary" type="submit" value="Đăng nhập" />
                                    <label for="">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký tại đây</a></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
