@extends('site.master.layout')

@section('content')
    <div class="main-panel">
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card strpied-tabled-with-hover">
                            <div class="card-header ">
                                <h4 class="card-title">Danh sách tài khoản</h4>
                            </div>
                            <section class="vh-100 gradient-custom">
                                <hr>

                                <div class="container">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Số tk</th>
                                            <th scope="col">Tên tk</th>
                                            <th scope="col">Tên ngân hàng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>255485454</td>
                                            <td>NGUYEN VAN A</td>
                                            <td>BIDV</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>255485454</td>
                                            <td>NGUYEN VAN A</td>
                                            <td>VPBANK</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card strpied-tabled-with-hover">
                            <div class="card-header ">
                                <h4 class="card-title">Nội dung thanh toán</h4>
                            </div>
                            <div class="content text-center">
                                <hr>
                                <p>
                                    Để thanh toán giao dịch. Vui lòng chuyển tiền vào 1 trong số các tài khoản trên.
                                </p>
                                <p>
                                    Chuyển khoản với nội dung: <span class="text-danger"> NAP TIEN DON HANG {{ $trans->trans_id }}</span>
                                </p>
                                <p>
                                    Chúng tôi sẽ cập nhật đơn hàng sau khi nhận được thanh toán.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
        </footer>
    </div>

@endsection
