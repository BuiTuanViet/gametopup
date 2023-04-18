<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index(Request $request){
        $groups = Group::orderBy('id', 'ASC');
        $users = User::with('group')->where('role', 2);
        if ($request->sale_id){
            $users = $users->where('id', $request->sale_id);
        }
        if ($request->group_id){
            $users = $users->where('group_id', $request->group_id);

            $arrUser = json_decode(json_encode($users->pluck('id')),true);
        }
        $users = $users->get();
        $groups = $groups->get();
        $data = [];

        $trans = new Transaction();
        if ($request->time_range){
            $timeArr = explode('-', $request->time_range);
            $timeStart = date('Y-m-d 00:00:00', strtotime(trim($timeArr[0])));
            $timeEnd =  date('Y-m-d 23:59:59', strtotime(trim($timeArr[1])));
            $trans = $trans->where('request_time', '>=', $timeStart)
                ->where('request_time', '<=', $timeEnd);
        }
        if ($request->group_id){
            $trans = $trans->whereIn('sale_id', $arrUser);
        }
        $totalTopupAll = $trans->where('type', 0)->count();
        $sumTopupAll = $trans->where('type', 0)->sum('amount');
        $totalWithdrawAll = $trans->where('type', 1)->count();
        $sumWithdrawAll = $trans->where('type', 1)->sum('amount');
        $revenueAll = $sumTopupAll - $sumWithdrawAll ;
//        $trans = $trans->get();

        foreach ($users as $item){
            $transactions = Transaction::where('sale_id', $item->id);

            if ($request->time_range){
                $timeArr = explode('-', $request->time_range);
                $timeStart = date('Y-m-d 00:00:00', strtotime(trim($timeArr[0])));
                $timeEnd =  date('Y-m-d 23:59:59', strtotime(trim($timeArr[0])));
                $transactions = $transactions->where('request_time', '>=', $timeStart)
                    ->where('request_time', '<=', $timeEnd);
            }
            $transactions = $transactions->get();

            $totalTopup = 0;
            $sumTopup = 0;
            $totalWithdraw = 0;
            $sumWithdraw = 0;
            foreach ($transactions as $tran){
                if ($tran->type == 0){
                    $totalTopup += 1;
                    $sumTopup += $tran->amount;
                } elseif ($tran->type == 1){
                    $totalWithdraw += 1;
                    $sumWithdraw += $tran->amount;
                }
            }

            $data[$item->id]['user_name'] = $item->user_name;
            $data[$item->id]['group'] = isset($item->group->group_name) ? $item->group->group_name : '';
            $data[$item->id]['name'] = $item->name;
            $data[$item->id]['total_topup'] = $totalTopup;
            $data[$item->id]['sum_topup'] = $sumTopup;
            $data[$item->id]['total_withdraw'] = $totalWithdraw;
            $data[$item->id]['sum_withdraw'] = $sumWithdraw;
            $data[$item->id]['revenue'] = $sumTopup - $sumWithdraw;
        }
        $data = json_decode(json_encode($data));

        return view('admin.revenue.list')->with([
            'revenues' => $data,
            'groups' => $groups,
            'sales' => $users,
            'totalTopupAll' => $totalTopupAll ,
            'sumTopupAll' => $sumTopupAll,
            'totalWithdrawAll' => $totalWithdrawAll,
            'sumWithdrawAll' => $sumWithdrawAll,
            'revenueAll' => $revenueAll,
        ]);
    }
}
