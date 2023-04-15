<?php

namespace App\Http\Controllers\Site;

use App\Business\TransactionBusiness;
use App\Helper\CommonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopupRequest;
use App\Http\Requests\WithdrawRequest;
use App\Models\Bank;
use App\Models\BankUser;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public $transactionBusiness;
    public function __construct()
    {
        $this->transactionBusiness = new TransactionBusiness();
    }

    public function index(Request $request){
        $id = Auth::user()->id;
        $trans = $this->transactionBusiness->getWithUserId($id);

        return view('site.transactions')->with([
            'transactions' => $trans
        ]);
    }

    public function topup(){
        $bank = Bank::all();
        return view('site.topup')->with([
            'banks' => $bank
        ]);
    }

    public function postTopup(TopupRequest $request){
        $data = [
            'trans_id' => CommonHelper::generateTransId(),
            'acc_no' => $request->acc_no,
            'bank_no' => $request->bank_no,
            'amount' => $request->amount,
            'user_id' => Auth::user()->id,
            'type' => '0',
            'request_time' => new \DateTime(),
            'created_at' => new \DateTime(),
            'promotion_code' => isset($request->promotion_code) ? $request->promotion_code : null,
        ];

        $save = Transaction::insert($data);

        return redirect()->route('show_bank_account', ['trans_id' => $data['trans_id']]);
    }

    public function showBankAccount($transId){
        $trans = Transaction::where('trans_id', $transId)->first();

        return view('site.bank_list_topup')->with([
            'trans' => $trans
        ]);
    }

    public function withdraw(){
        return view('site.withdraw');
    }

    public function postWithdraw(WithdrawRequest $request){
        $bankUser = BankUser::where('user_id', Auth::user()->id)->first();
        $data = [
            'trans_id' => CommonHelper::generateTransId(),
            'acc_no' => $bankUser->acc_no,
            'bank_no' => $bankUser->bank_no,
            'amount' => $request->amount,
            'user_id' => Auth::user()->id,
            'type' => '1',
            'request_time' => new \DateTime(),
            'created_at' => new \DateTime(),
            'promotion_code' => isset($request->promotion_code) ? $request->promotion_code : null,
        ];

        $save = Transaction::insert($data);
        return redirect()->back()->with([
            'success' => 'Yêu cầu rút tiền đã được ghi nhận.'
        ]);
    }

}
