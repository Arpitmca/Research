<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $table = "researches";
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function getFundValue()
    {
        return $this->transactions->where("status", "SUCCESS")->sum("amount");
    }
    public function getRemainingFundValue()
    {
        return $this->goal_amount - $this->getFundValue();
    }
}
