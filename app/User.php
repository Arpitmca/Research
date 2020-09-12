<?php

namespace App;

use App\Models\Research;
use App\Models\Transaction;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isResearcher()
    {
        if ($this->type == "R") {
            return true;
        }
        return false;
    }
    public function isInvestor()
    {
        if ($this->type == "I") {
            return true;
        }
        return false;
    }
    public function isProfileCompleted()
    {
        if ($this->info) {
            return true;
        }
        return false;
    }
    public function getFirstNameAttribute()
    {
        return explode(" ", $this->name)[0];
    }
    public function getAddressAttribute()
    {
        if (!$this->info) {
            return null;
        }
        return json_decode($this->info)->address;
    }
    public function getCityAttribute()
    {
        if (!$this->info) {
            return null;
        }
        return json_decode($this->info)->city;
    }
    public function getStateAttribute()
    {
        if (!$this->info) {
            return null;
        }
        return json_decode($this->info)->state;
    }
    public function getCountryAttribute()
    {
        if (!$this->info) {
            return null;
        }
        return json_decode($this->info)->country;
    }
    public function getPinAttribute()
    {
        if (!$this->info) {
            return null;
        }
        return json_decode($this->info)->pin;
    }
    public function getContactAttribute()
    {
        if (!$this->info) {
            return null;
        }
        return json_decode($this->info)->contact;
    }
    public function getAboutAttribute()
    {
        if (!$this->info) {
            return null;
        }
        return json_decode($this->info)->about;
    }
    public function getActivitiesAttribute()
    {
        if (!$this->info) {
            return null;
        }
        return json_decode($this->info)->activities;
    }
    public function getLinkedinurlAttribute()
    {
        if (!$this->info) {
            return null;
        }
        return json_decode($this->info)->linkedinurl;
    }
    public function getProfessionalAttribute()
    {
        if (!$this->info) {
            return null;
        }
        return json_decode($this->info)->professional;
    }
    public function getImageAttribute()
    {
        if (!$this->info) {
            return null;
        }
        if (!isset(json_decode($this->info)->image)) {
            return null;
        }
        return json_decode($this->info)->image;
    }
    public function getConcealedPhone()
    {
        if (!Auth::check()) {
            return "********" . substr($this->contact, 8,10);
        }
        return $this->contact;
    }
    public function getConcealedEmail()
    {
        if (!Auth::check()) {
            return "************" . substr($this->email, 8,200);
        }
        return $this->email;
    }
    public function researches()
    {
        return $this->hasMany(Research::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
        
    }

}
