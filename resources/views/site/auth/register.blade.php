<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('assset/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('assset/css/login.css') }}" rel="stylesheet">
    <script src="{{ asset('assset/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('assset/js/bootstrap.min.js') }}"></script>

    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #f093fb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
        }

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
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Đăng ký </h3>
                        <form method="post" action="{{ route('post_register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="userName">Tên đăng nhập</label>
                                        <input type="text" id="userName" name="user_name" class="form-control" />
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

                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="password_confirmation">Nhập lại Mật khẩu</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" />
                                        @error('password_confirmation')
                                        <p class="text-danger"><i>{{ $message }}</i></p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="name">Họ tên(Lưu ý: nhập đúng với tên tài khoản ngân hàng)</label>
                                        <input type="text" id="name" name="name" class="form-control" />
                                        @error('name')
                                        <p class="text-danger"><i>{{ $message }}</i></p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="phone">Số điện thoại</label>
                                        <input type="text" id="phone" name="phone" class="form-control" />
                                        @error('phone')
                                        <p class="text-danger"><i>{{ $message }}</i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="name">Mức quy đổi </label>
                                        <select class="select form-control" name="rate">
                                            <option value="1">1đ = 25.000đ</option>
                                            <option value="2">1đ = 50.000đ</option>
                                            <option value="3">1đ = 100.000đ</option>
                                        </select>
                                        @error('rate')
                                        <p class="text-danger"><i>{{ $message }}</i></p>
                                        @enderror
                                    </div>
                                </div>
                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
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
