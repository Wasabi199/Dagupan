<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Carbon;
use App\Models\{User, Complaints, ComplaintImages, Barangay};
// use Carbon\Carbon;
use Illuminate\Support\Facades\Request as QueryRequest;
use App\Http\Requests\TransferComplaintRequest as transferRequest;
use Illuminate\Support\Facades\Redirect;

class BarangayController extends Controller
{
    //
    public function newComplaint(){
        
        $user = User::findOrFail(auth()->id());
        $barangay = Barangay::where('user_id',$user->id)->get()->first();
        $complaints = Complaints::with('image')->where('address',$barangay->barangay)->where('created_at','like','%'.Carbon::now()->format('Y-m-d').'%')->limit(4)->orderByRaw('created_at DESC')->paginate(4);
        // dd($complaints);
        return Inertia::render('Barangay/NewComplaint',[
            'Complaints'=>$complaints
        ]);
    }
    
    public function pendingComplaint(){
        $user = User::findOrFail(auth()->id());
        $barangay = Barangay::where('user_id',$user->id)->get()->first();
        $complaints = Complaints::with('image')->where('address',$barangay->barangay)->where('status','Pending')->limit(4)->orderByRaw('created_at DESC')->paginate(4);
        return Inertia::render('Barangay/PendingComplaint',[
            'Complaints'=>$complaints
        ]);
    }

    public function solvedComplaint(){
        $user = User::findOrFail(auth()->id());
        $barangay = Barangay::where('user_id',$user->id)->get()->first();
        $complaints = Complaints::with('image')->where('address',$barangay->barangay)->where('status','Solved')->limit(4)->orderByRaw('created_at DESC')->paginate(4);
        return Inertia::render('Barangay/SolvedComplaint',[
            'Complaints'=>$complaints
        ]);
    }
    
    public function transferedComplaint(){
        $user = User::findOrFail(auth()->id());
        $barangay = Barangay::where('user_id',$user->id)->get()->first();
        $complaints = Complaints::with('image')->where('address',$barangay->barangay)->where('status','Transfered')->limit(4)->orderByRaw('created_at DESC')->paginate(4);
        return Inertia::render('Barangay/TransferedComplaint',[
            'Complaints'=>$complaints
        ]);
    }

    public function transferedComplaintRequest(transferRequest $request){
        $validated_data = $request->validated();
        $complaint = Complaints::findOrFail($validated_data['id']);
        $complaint->update($validated_data);
        return Redirect::back();
    }
}
