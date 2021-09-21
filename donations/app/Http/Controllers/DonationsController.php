<?php

namespace App\Http\Controllers;

use App\Korisnik;
use Illuminate\Http\Request;
use App\Donation;
use App\Aplication;
use Auth;
use PharIo\Manifest\Application;

//use Illuminate\Support\Facades\Auth;

class DonationsController extends Controller
{

    public function donations()
    {
        if (!Auth::check())
        {
            return redirect('login');
        }
        $donations=Donation::orderByDesc('created_at')->take(10)->get();
        $i = 1;
        return view('home', ['donacii' => $donations, 'i'=>$i]);
    }

    public function home()
    {
        if (!Auth::check())
        {
            return redirect('login');
        }
        $userId=Auth::user() -> id;
        $donations=Donation::where('user_id', $userId)->get();
        $req=Aplication::where('user_id', $userId)->pluck('donation_id');
        $donA=Donation::whereIn('id', $req)->get();
        $i = 1;
        return view('lista', ['donacii' => $donations, 'donA' => $donA, 'i'=>$i]);
    }

    public function userDonations()
    {
        if (!Auth::check())
        {
            return redirect('login');
        }
        $userId=Auth::user()->id;
        $donations=Donation::orderByDesc('created_at')->where('user_id', $userId)->get();
        $i = 1;
        return view('myDonations', ['donacii' => $donations, 'i'=>$i]);

    }

    public function apply(Donation $donation)
    {
        $i = 1;
        $broj=Aplication::where('donation_id', $donation->id)->count();
        return view('apply', ['donation' => $donation, 'broj'=> $broj, 'i'=>$i]);
    }

    public function select(Donation $donation)
    {
        return view('select', ['donation' => $donation]);
    }

    public function saveSelect(Request $request, Donation $donation)
    {
        $validateData = $request->validate([
            'izbran' => ['required']
        ]);

        $korisnik=$request->input('izbran');
        Donation::where('id', $donation->id)->update(['donated_to'=>$korisnik, 'resolved'=>1]);
        return redirect('/');
    }

    public function saveRandom(Request $request)
    {
        $donationId = $request->input('m');
        $randomRequest = Aplication::where('donation_id', $donationId)->inRandomOrder()->first();
        Donation::where('id', $donationId)->update(['donated_to'=>$randomRequest->user_id, 'resolved'=>1]);
        return redirect('/');
    }



    public function saveApply(Request $request, Donation $donation)
    {
        $validatedData = $request->validate([
            'plea' => ['required']
        ]);
        $userId = Auth::user()->id;
        $alreadyRequested = Aplication::where('user_id', $userId)->where('donation_id',$donation->id)->first();
        if(!$alreadyRequested){
            Aplication::create(['donation_id' => $donation->id, 'user_id' => $userId, 'request_plea' => $request->plea]);
        }
        else{
            dd('You have already applied once');
        }
        return redirect('/');
    }


//    public function fillDonation()
//    {
//        $donations = [
//            ['donation' => 'don1', 'image_path' => '', 'description' => 'des1', 'user_id' => 1],
//            ['donation' => 'don2', 'description' => 'des2','image_path' => '', 'user_id' => 1],
//            ['donation' => 'don3', 'description' => 'des3', 'image_path' => '', 'user_id' => 1]
//        ];
//
//        foreach($donations as $d)
//        {
//            Donation::create($d);
//        }
//    }
}
