@extends('site.master.layout')

@section('content')
    <div class="main-panel">
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rút tiền</h4>
                            </div>
                            <div class="card-body">
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                      <p>{!! \Session::get('success') !!}</p>
                                    </div>
                                @endif
                                <form method="post" action="{{ route('post_withdraw') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Số tiền</label>
                                                <input type="text" class="form-control" name="amount" placeholder="Số tiền rút"
                                                       value="{{ old('amount') }}">
                                                @error('amount')
                                                <p class="text-danger"><i>{{ $message }}</i></p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mã khuyến mãi</label>
                                                <input type="text" class="form-control" name="promotion_code" placeholder="Mã khuyến mãi"
                                                       value="{{ old('promotion_code') }}">
                                                @error('amount')
                                                <p class="text-danger"><i>{{ $message }}</i></p>
                                                @enderror
                                            </div>
                                        </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info btn-fill">Rút tiền</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
