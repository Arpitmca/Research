<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use App\Models\Research;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'investor', 'verified']);
    }
    public function getInvestments()
    {
        $transactions = Auth::user()->transactions()->where("status", "SUCCESS")->get();
        $rIds = [];
        foreach ($transactions as $txn) {
            $rIds[] = $txn->research_id;
        }
        $rIds = array_unique($rIds);
        $researches = Research::orderBy("created_at", "desc")->whereIn("id",$rIds)->paginate(10);
        return view("research.multiple.index", ['researches' => $researches, "heading" => "Your Investments", "subheading" => "These are the researches that you have funded.", "shownewresearchbutton" => false]);

    }
    public function getPublicProfile(User $investor)
    {
        return view("profile.investor.publicview", ['user' => $investor]);
    }
    public function getPublicInvestments(User $investor)
    {
        $transactions = $investor->transactions()->where("status", "SUCCESS")->get();
        $rIds = [];
        foreach ($transactions as $txn) {
            $rIds[] = $txn->research_id;
        }
        $rIds = array_unique($rIds);
        $researches = Research::orderBy("created_at", "desc")->whereIn("id",$rIds)->paginate(10);
        return view("research.multiple.index", ['researches' => $researches, "heading" => $investor->first_name ."'s Investments", "subheading" => "These are the researches that {$investor->first_name} have funded.", "shownewresearchbutton" => false]);

    }
}
