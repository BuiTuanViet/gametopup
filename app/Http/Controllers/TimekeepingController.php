<?php

namespace App\Http\Controllers;

use App\Repositories\TimekeepingRepository\TimekeepingRepositoryInterface;
use App\Repositories\TotalKeeping\TotalKeepingRepository;
use App\Repositories\TotalKeeping\TotalKeepingRepositoryInterface;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TimekeepingController extends Controller
{
    protected $timekeepingRepository;
    protected $totalKeepingRepository;
    protected $settingUse;
    protected $ip;
    protected $timeZone;

    public function __construct(
        TimekeepingRepositoryInterface $timekeepingRepository,
        TotalKeepingRepositoryInterface $totalKeepingRepository
    )
    {
        $this->timekeepingRepository = $timekeepingRepository;
        $this->totalKeepingRepository = $totalKeepingRepository;
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->timeZone = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $this->settingUse = DB::table('settings')->where('active', 1)->first();
    }

    public function checkIn()
    {
        if ($this->ip != $this->settingUse->ip_address){
            return  redirect()->back()->with('error', 'Bạn đang nằm ngoài khu vực chấm công');
        }
        $userId = Auth::user()->id;
        $data = [
            'user_id' => $userId,
            'time_check' => $this->timeZone->toTimeString(),
            'type' => 0,
            'date' => $this->timeZone->toDateString()
        ];

        $this->timekeepingRepository->store($data);
        return redirect()->back()->with('success', 'Chấm công vào thành công');

    }

    public function checkOut()
    {
        if ($this->ip != $this->settingUse->ip_address){
            return redirect()->back()->with('error', 'Bạn đang nằm ngoài khu vực chấm công');
        }
        $userId = Auth::user()->id;
        $data = [
            'user_id' => $userId,
            'time_check' => $this->timeZone->toTimeString(),
            'type' => 1,
            'date' => $this->timeZone->toDateString()
        ];

        $this->timekeepingRepository->store($data);

        $timekeeping = $this->timekeepingRepository->getCheck($userId, $this->timeZone->toDateString())->first();

        $totalKeeping = $this->timeZone->diffInHours($timekeeping->time_check);

        $breachTime = isset($this->settingUse->breck_time) ? $this->settingUse->breck_time :  2 ;

        $realyTime = $totalKeeping - $breachTime ;

        if($totalKeeping < 6 ){
            $realyTime = $totalKeeping;
        }

        DB::table('total_times')->insert([
            'user_id' =>  $userId,
            'date' =>  $this->timeZone->toDateString(),
            'total_time' =>  $realyTime,
        ]);

      return redirect()->back()->with('success', 'Chấm công ra thành công');
    }

    public function getTimeKeeping($userId)
    {
        $timeKeeping = $this->timekeepingRepository->getWith($userId);

        return response()->json($timeKeeping);
    }

    public function getTotalKeeping($userId)
    {
        $totalTimeKeeping = $this->totalKeepingRepository->getWith($userId);

        return response()->json($totalTimeKeeping);
    }
}
