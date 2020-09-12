<?php

namespace App\Http\Controllers\Transaction;

use App\Helpers\PayTM\PayTM;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function getFailedPaymentResponse(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::user()->id) {
            return redirect(route("home"))->withError("It seems that something broke with this payment. Please try again.");
        }
        return view("transaction.transactionfailed", ['transaction' => $transaction]);
    }
    public function getRetryPayTMPayment(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::user()->id) {
            return redirect(route("transaction.failed", ['transaction' => $transaction]))->withError("It seems that something broke with this payment. Please try again.");
        }
        if (!$transaction->isRetryable()) {
            return redirect(route("transaction.failed", ['transaction' => $transaction]))->withError("The transaction cannot be retried due to bank restrictions. Kindly order afresh.");
            
        }
        $newTransaction =  Transaction::build($transaction->research, $transaction->amount ,$transaction->gateway);
        return $this->getOrderPayTMPay($request, $newTransaction);
    }
    public function getOrderPayTMPay(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::user()->id) {
            return redirect(route("home"))->withError("It seems that something broke with this payment. Please try again.");
        }
        if (!$transaction->isPayable()) {
            return redirect(route("home"))->withError("This order is not in the state to pay.");
        }
        $paytm = new PayTM;

        $checkSum = "";
        $paramList = array();
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] =  $transaction->id . "_" . time();
        $paramList["CUST_ID"] = "TUSER-". $transaction->user_id;
        $paramList["INDUSTRY_TYPE_ID"] = "WEBSITE";
        $paramList["CHANNEL_ID"] = "WEB";
        $paramList["TXN_AMOUNT"] = $transaction->amount;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
        $paramList["CALLBACK_URL"] = route("paytm.glide") ;
        // $paramList["MSISDN"] = $MSISDN; //Mobile number of customer
        // $paramList["EMAIL"] = ; //Email ID of customer
        // $paramList["VERIFIED_BY"] = "EMAIL"; //
        // $paramList["IS_USER_VERIFIED"] = "YES"; //

        //Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
        $transaction->status = "PENDING";
        $transaction->save();
        return view("transaction.payviapaytm", ["transaction" => $transaction, 'paramList' => $paramList, 'checkSum' => $checkSum]);
    }
    public function getPaymentConfirmation(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::user()->id) {
            return redirect(route("home"))->withError("It seems that something broke with this payment. Please try again.");
        }
        return view("transaction.confirmation", ['transaction' => $transaction]);
    }
}
