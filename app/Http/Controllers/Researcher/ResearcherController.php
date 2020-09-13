<?php

namespace App\Http\Controllers\Researcher;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ResearcherController extends Controller
{
    public function getProfile(User $researcher)
    {
        return view("profile.researcher.publicview", ['researcher' => $researcher]);
    }
    public function getResearches(User $researcher)
    {
        $researches = $researcher->researches()->where("status", "LIVE")->paginate(10);
        return view("research.multiple.index", ['researches' => $researches, "heading" => $researcher->first_name . "'s Researches", "subheading" => "These are the researches where " .$researcher->first_name . " is working on.", "shownewresearchbutton" => false]);
    }
}
