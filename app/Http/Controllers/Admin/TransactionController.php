<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = Transaction::with('user');

        if ($request->trans_id){
            $transactions = $transactions->where('trans_id', $request->trans_id);
        }
        if ($request->time_range){
            $timeArr = explode('-', $request->time_range);
            $timeStart = date('Y-m-d 00:00:00', strtotime(trim($timeArr[0])));
            $timeEnd =  date('Y-m-d 23:59:59', strtotime(trim($timeArr[0])));
            $transactions = $transactions->where('request_time', '>=', $timeStart)
                ->where('request_time', '<=', $timeEnd);
        }
        if ($request->status){
            $transactions = $transactions->where('status', $request->status);
        }
        if ($request->type){
            $transactions = $transactions->where('type', $request->type);
        }
        $transactions = $transactions->paginate(10);

        return view('admin.transaction.index')->with([
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trans = Transaction::where('trans_id', $id)->first();
        $trans->destroy($id);
        return redirect(route('transaction.index'))->with(['success', "Cập nhật thành công"]);

    }

    public function accept($id)
    {
        $trans = Transaction::where('trans_id', $id)->first();
        $trans->status = $trans->status == 0 ? '1' : 0;
        $trans->save();

        return redirect(route('transaction.index'))->with(['success', "Cập nhật thành công"]);
    }

    public function cancel($id)
    {
        $trans = Transaction::where('trans_id', $id)->first();
        $trans->status = 2;
        $trans->save();

        return redirect(route('transaction.index'))->with(['success', "Cập nhật thành công"]);
    }
}
