<?php

namespace App\Http\Controllers\PayTM;

use App\Helpers\PayTM\PayTM;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PayTMController extends Controller
{
    public function testAPayment(Request $request)
    {
        // if ($request->input("challenge") != 'Sprite') {
        //     abort(404);
        // }
        $paytm = new PayTM;
        $order_id = "TEST_GLIDE_" . random_int(0, 99999);
        $amount = "1.00";
        $token = $paytm->createToken($order_id, $amount);
        return view("paytm.test", compact("order_id", "amount", "token"));
    }
    public function catchGlide(Request $request)
    {
        $paytm = new PayTM;
        $isValidChecksum = "FALSE";
        $paramList = $_POST;
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
        $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
        if($isValidChecksum == "TRUE") {
            if ($_POST["STATUS"] == "TXN_SUCCESS") {
                $transaction = Transaction::findOrFail($_POST['ORDERID']);
                if ($transaction->status != "SUCCESS") {
                    $transaction->status = "SUCCESS";
                    $transaction->response = json_encode($_POST);
                    $transaction->remark .= "| SUCCESSFUL RESPONSE RECEIVED ON " . now() .  " TIMESTAMP: ". time() ." |";
                    $transaction->save();
                    return redirect(route("transaction.confirmation", ['research' => $transaction]));
                } else {
                    abort(404);
                }
            }
            elseif($_POST["STATUS"] == "TXN_FAILURE") {
                $transaction = Transaction::findOrFail($_POST['ORDERID']);
                if ($transaction->status != "FAILED") {
                    $transaction = Transaction::findOrFail($_POST['ORDERID']);
                    $transaction->status = "FAILED";
                    $transaction->error_message = $request->input("errorMessage");
                    $transaction->response = json_encode($_POST);
                    $transaction->remark .= "| FAILED RESPONSE RECEIVED ON " . now() .  " TIMESTAMP: ". time() ." |";
                    $transaction->save();
                    return redirect(route("transaction.failed", ['transaction' => $transaction]));
                } else {
                    abort(404);
                }

            } else {
                Log::critical("UNUSUAL PAYMENT STATUS: " .  json_encode($_POST));
                abort(404);
            }
        }
        else {
            Log::critical("SUSPICIOUS PAYMENT: " .  json_encode($_POST));
            abort(404);        
        }
    }
    public function catchWebhook(Request $request)
    {
        $paytm = new PayTM;
        $isValidChecksum = "FALSE";
        $paramList = $_POST;
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
        $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
        if($isValidChecksum == "TRUE") {
            if ($_POST["STATUS"] == "TXN_SUCCESS") {
                $transaction = Transaction::findOrFail($_POST['ORDERID']);
                if ($transaction->status != "SUCCESS") {
                    Cart::clearCart();
                    $transaction->status = "SUCCESS";
                    $transaction->response = json_encode($_POST);
                    $transaction->remark .= "| SUCCESSFUL RESPONSE RECEIVED  VIA WEBHOOK  ON " . now() .  " TIMESTAMP: ". time() ." |";
                    $transaction->save();
                    return redirect(route("advanced.order.confirmation", ['aorder' => $transaction->aorder]));
                } else {
                    abort(404);
                }
            }
            elseif($_POST["STATUS"] == "TXN_FAILURE") {
                $transaction = Transaction::findOrFail($_POST['ORDERID']);
                if ($transaction->status != "FAILED") {
                    $transaction = Transaction::findOrFail($_POST['ORDERID']);
                    $transaction->status = "FAILED";
                    $transaction->error_message = $request->input("errorMessage");
                    $transaction->response = json_encode($_POST);
                    $transaction->remark .= "| FAILED RESPONSE RECEIVED VIA WEBHOOK ON " . now() .  " TIMESTAMP: ". time() ." |";
                    $transaction->save();
                    return redirect(route("transaction.failed", ['transaction' => $transaction]));
                } else {
                    abort(404);
                }

            } else {
                Log::critical("UNUSUAL PAYMENT STATUS  VIA WEBHOOK : " .  json_encode($_POST));
                abort(404);
            }
        }
        else {
            Log::critical("SUSPICIOUS PAYMENT  VIA WEBHOOK : " .  json_encode($_POST));
            abort(404);        
        }
    }
}
