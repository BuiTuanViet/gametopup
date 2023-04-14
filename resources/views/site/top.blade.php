@extends('site.master.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('admin-lte/full-main.min.css') }}">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Calendar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Calendar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if (session('success'))
        <div class="alert alert-success mx-2 mt-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger mx-2 mt-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 id="clock" class="card-title">
                                </h4>
                            </div>
                            <div class="card-body">
                                <?php
                                use Carbon\Carbon;
                                $user =  \Illuminate\Support\Facades\Auth::user()->id;
                                $time = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
                                $timeNow = $time->toDateString();
                                $checkTimeIn = \App\Models\TimeKeeping::getWith($timeNow, $user)->where('type', 0)->first();
                                $checkTimeOut = \App\Models\TimeKeeping::getWith($timeNow, $user)->where('type', 1)->first();
                                ?>

                                @if(!$checkTimeIn)
                                <a href="{{ route('checkIn') }}">
                                    <button id="check_in" class="btn btn-primary"> Chấm công vào <i
                                            class="sign-in-alt"></i></button>
                                </a>
                                    @elseif(!$checkTimeOut)
                                <a href="{{ route('checkOut') }}">
                                    <button id="check_out" class="btn btn-success"> Chấm công ra <i
                                            class="sign-in-alt"></i></button>
                                </a>
                                    @else
                                        <i class="text-danger">Bạn đã chấm công ngày hôm nay</i>
                                    @endif
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thời gian quy định </h3>
                            </div>
                            <?php
                                $time = \App\Models\Setting::getAtive();
                            ?>
                            <div class="card-body">
                                <div class="box-body">
                                    <div class="alert alert-warning alert-dismissible text-danger">
                                        <h4><i class="icon fa fa-exclamation-triangle"></i> Thời gian làm!</h4>
                                        Từ <i class="time-start"> {{ $time->time_start }}</i> đến <i class="time-"> {{ $time->time_out }}</i>
                                    </div>
                                    <div class="alert alert-success alert-dismissible">
                                        <h5><i class="icon fa fa-check"></i> Thời gian nghỉ trưa!</h5>
                                        <i class="breck-time"> {{ $time->breck_time }}</i> giờ
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar" class="fc fc-ltr fc-bootstrap" style="">

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('js')
    <script src="{{ asset('admin-lte/full-main.min.js') }}"></script>
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('clock').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }
            ;  // add zero in front of numbers < 10
            return i;
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let listEvent = [];
            var userId = {{ \Illuminate\Support\Facades\Auth::user()->id }};
            // var timeStart = $('.time-start').text();
            // var timeOut = $('.time-out').text();
            // var breckTime = $('.breck-time').text();

            $.ajax({
                url: "getTimeKeeping/" + userId,
            }).done(function (data) {
                $.each(data, function (i, item) {
                    let color = '#007bff';
                    let title = 'Vào: ';

                    if (item.type === 1) {
                        color = '#28a745';
                        title = 'Ra: ';
                    }

                    listEvent[i] = {
                        title: title + item.time_check,
                        start: item.date,
                        backgroundColor: color
                    }

                });
                console.log(listEvent);

                calenda(listEvent)
            });

            function calenda(listEvent) {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    themeSystem: 'bootstrap',
                    initialView: 'dayGridMonth',
                    events: listEvent
                });
                calendar.render();
            }
        });

    </script>
@endsection
