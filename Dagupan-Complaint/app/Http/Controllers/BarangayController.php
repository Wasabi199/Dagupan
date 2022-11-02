<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Carbon;
use App\Models\{User, Complaints, ComplaintImages, Barangay};
// use Carbon\Carbon;
use Illuminate\Support\Facades\Request as QueryRequest;
use App\Http\Requests\TransferComplaintRequest as transferRequest;
use App\Http\Requests\SolvedComplaintRequest as solvedRequest;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Mail;
use App\Mail\Notify;

use App\Notifications\ComplaintNotification;

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
        // $complaint->update($validated_data);
        
        $data=[
            'subject'=>'Complaint Transfered',
            'body'=>'Your Complaint has been Transfered'
        ];

        try{
            Mail::to($complaint->email)->send(new Notify($data));
            $complaint->update($validated_data);
            // return response()->json(['Please Check Your Inbox!']);
        }catch(\Exception $e){
            // return response()->json(['Something Went Wrong!']);
        }
        return Redirect::back();
    }

    public function solvedComplaintRequest(solvedRequest $request){
        $validated_data = $request->validated();
        $complaint = Complaints::findOrFail($validated_data['id']);
       

        $data=[
            'subject'=>'Complaint Solved',
            'body'=>'Your Complaint has been Solved'
        ];

        try{
            Mail::to($complaint->email)->send(new Notify($data));
            $complaint->update($validated_data);
            // return response()->json(['Please Check Your Inbox!']);
        }catch(\Exception $e){
            // return response()->json(['Something Went Wrong!']);
        }


        return Redirect::back();
    }

  
}
