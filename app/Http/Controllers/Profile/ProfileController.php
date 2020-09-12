<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function getResearcherProfile($value='')
    {
        return view("profile.researcher.view");
    }
    public function getEditResearcherProfile($value='')
    {
        return view("profile.researcher.edit");
    }
    public function editResearcherProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'pin' => 'required|max:255',
            'contact' => 'required|required|min:11|numeric',
            "about" => "required|max:800",
            "linkedinurl" => "required",
            "activities" => "required",
            "professional" => "required",
        ]);
        if (!Auth::user()->image) {
            if (!$request->file("image")) {
                return redirect()->back()->withError("Profile Image is required.");
            }
        }

        if ($request->hasFile("image")) {
           $image_name = md5(random_bytes(4));
           $filename = pathinfo($image_name,PATHINFO_FILENAME);
           $image_ext = $request->file('image')->getClientOriginalExtension();
           $fileNameToStore = $filename.'_'.time().'.'.$image_ext;
           $path =  $request->file('image')->storeAs('public/profile',$fileNameToStore);
           $validatedData['image'] = $fileNameToStore;
        }
        $user = Auth::user();
        $user->info = json_encode($validatedData);
        $user->save();
        return redirect(route("researcher.profile"))->withSuccess("Changes successfully made.");
    }

    public function getInvestorProfile($value='')
    {
        return view("profile.investor.view");
    }
    public function getEditInvestorProfile($value='')
    {
        return view("profile.investor.edit");
    }
    public function editInvestorProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'pin' => 'required|max:255',
            'contact' => 'required|required|min:11|numeric',
            "about" => "required|max:800",
            "linkedinurl" => "required",
            "activities" => "required",
            "professional" => "required",
        ]);
        if (!Auth::user()->image) {
            if (!$request->file("image")) {
                return redirect()->back()->withError("Profile Image is required.");
            }
        }

        if ($request->hasFile("image")) {
           $image_name = md5(random_bytes(4));
           $filename = pathinfo($image_name,PATHINFO_FILENAME);
           $image_ext = $request->file('image')->getClientOriginalExtension();
           $fileNameToStore = $filename.'_'.time().'.'.$image_ext;
           $path =  $request->file('image')->storeAs('public/profile',$fileNameToStore);
           $validatedData['image'] = $fileNameToStore;
        }
        $user = Auth::user();
        $user->info = json_encode($validatedData);
        $user->save();
        return redirect(route("investor.profile"))->withSuccess("Changes successfully made.");
    }
}
