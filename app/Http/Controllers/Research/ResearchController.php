<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResearchController extends Controller
{
    public function getResearches()
    {
        $researches = Research::where("status", "LIVE")->paginate(10);
        return view("research.multiple.index", ['researches' => $researches, "heading" => "Researches", "subheading" => "Active researches which needs your help to continue.", "shownewresearchbutton" => false]);
    }
    public function getMyResearch(Request $request)
    {
        $researches = Auth::user()->researches()->paginate(10);
        return view("research.multiple.index", ['researches' => $researches, "heading" => "My Researches", "subheading" => "These are the researches are working on.", "shownewresearchbutton" => true]);
    }
    public function getAddResearch(Request $request)
    {
        return view("research.add.add");
    }
    public function postAddResearch(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'content' => 'required|max:100000',
            'amount' => 'required|max:255',
            'subject' => 'required|max:255',
            'bank_ifsc' => 'required|max:255',
            'bank_account_no' => 'required|max:255',
            'tags' => 'required|array',
            "image" => "required|file",
        ]);
        $image_name = md5(random_bytes(4));
       $filename = pathinfo($image_name,PATHINFO_FILENAME);
       $image_ext = $request->file('image')->getClientOriginalExtension();
       $fileNameToStore = $filename.'_'.time().'.'.$image_ext;
       $path =  $request->file('image')->storeAs('public/profile',$fileNameToStore);
       $validatedData['image'] = $fileNameToStore;


        $research = new Research;
        $research->user_id = Auth::user()->id;
        $research->slug = str_slug($validatedData['title']);
        $research->title = $validatedData['title'];
        $research->status = "BORN";
        $research->description = $validatedData['description'];
        $research->content = $validatedData['content'];
        $research->goal_amount = $validatedData['amount'];
        $research->bank_account_number = $validatedData['bank_account_no'];
        $research->bank_account_ifsc = $validatedData['bank_ifsc'];
        $research->subject = $validatedData['subject'];
        $research->image = $validatedData['image'];
        $research->tags = json_encode($validatedData['tags']);
        $research->save();
        return redirect(route("research.mine"))->withSuccess("Research successfully added and waiting to be published.");
    }
    public function getViewResearch(Research $research)
    {
        return view("research.single.index", ['research' => $research]);
    }
    public function getEditResearch(Research $research, Request $request)
    {
        return view("research.edit.edit",['research' => $research]);
        
    }
    public function postEditResearch(Research $research, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'content' => 'required|max:100000',
            'amount' => 'required|max:255',
            'subject' => 'required|max:255',
            'bank_ifsc' => 'required|max:255',
            'bank_account_no' => 'required|max:255',
            'tags' => 'required|array',
        ]);
        if ($request->hasFile("image")) {
            $image_name = md5(random_bytes(4));
           $filename = pathinfo($image_name,PATHINFO_FILENAME);
           $image_ext = $request->file('image')->getClientOriginalExtension();
           $fileNameToStore = $filename.'_'.time().'.'.$image_ext;
           $path =  $request->file('image')->storeAs('public/profile',$fileNameToStore);
           $validatedData['image'] = $fileNameToStore;
           $research->image = $validatedData['image'];
        }
        


        $research->title = $validatedData['title'];
        $research->status = "EDITED";
        $research->description = $validatedData['description'];
        $research->content = $validatedData['content'];
        $research->goal_amount = $validatedData['amount'];
        $research->bank_account_number = $validatedData['bank_account_no'];
        $research->bank_account_ifsc = $validatedData['bank_ifsc'];
        $research->subject = $validatedData['subject'];
        
        $research->tags = json_encode($validatedData['tags']);
        $research->save();
        return redirect(route("research.mine"))->withSuccess("Research successfully edited and waiting to be published.");
    }
    public function getChangeStatus(Research $research, Request $request)
    {
        $research->status = $request->input("status");
        $research->save();
        return redirect()->back()->withSuccess("Status successfully changed.");
    }
    public function getFundPage(Research $research)
    {
        return view("research.fund.index", ['research' => $research]);
    }
    public function postFundPage(Request $request, Research $research)
    {
        $transaction = Transaction::build($research, $request->input("amount") ,"PAYTM_PAYMENT_GATEWAY" );
        return redirect(route("transaction.paytm.pay", ['transaction' => $transaction]))->withSuccess("Please wait, we are taking you for payment.");

    }
}
