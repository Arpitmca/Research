<?php

namespace App\Models;

use App\Models\Research;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    protected $table = "transactions";
     public static function build(Research $research, int $amount,  string $gateway)
    {
        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->research_id = $research->id;
        $transaction->gateway = $gateway;
        $transaction->status = "INITIATED";
        $transaction->amount = $amount;
        $transaction->currency = "INR";
        $transaction->save();
        return $transaction;
    }
    public function investor()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function research()
    {
        return $this->belongsTo(Research::class);
    }
    public function isPayable()
    {
        return true;
    }
    public function isRetryable()
    {
        return true;
    }
}
