<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\Complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use Inertia\Inertia;
class DashboardController extends Controller
{
    //
    public function index(){
        if(Auth::user()->userType == 'Admin'){
            $month = [0,0,0,0,0,0,0,0,0,0,0,0];
            $new_complaint = 0;
            $total_complaints = Complaints::all()->count();
            $complaints =Complaints::all();
            foreach(Complaints::all() as $complaints){
                if(($complaints->created_at)->format('Y-m-d') == Carbon::now()->format('Y-m-d')){
                    $new_complaint++;
                }
                if(($complaints->created_at)->format('Y') == Carbon::now()->format('Y')){
                    switch(($complaints->created_at)->format('m') ){
                        case '01':
                            $month[0]++;
                            break;
                        case '02':
                            $month[1]++;
                            break;
                        case '03':
                            $month[2]++;
                            break;
                        case '04':
                            $month[3]++;
                            break;
                        case '05':
                            $month[4]++;
                            break;
                        case '06':
                            $month[5]++;
                            break;
                        case '07':
                            $month[6]++;
                            break;
                        case '08':
                            $month[7]++;
                            break;
                        case '09':
                            $month[8]++;
                            break;
                        case '10':
                            $month[9]++;
                            break;
                        case '11':
                            $month[10]++;
                            break;
                        case '12':
                            $month[11]++;
                            break;
                    }
                }
            
            }
            return Inertia::render('Admin/Dashboard',[
                'complaints'=>$complaints,
                'complaintCount'=>$total_complaints,
                'newComplaint'=>$new_complaint,
                'month'=>$month
            ]);
        }   
        if(Auth::user()->userType == 'Barangay'){
            $user = User::with('barangay')->findOrFail(Auth::user()->id);
            return Inertia::render('Barangay/Dashboard',[
                'Profile'=>$user
            ]);
        }  
    }
}
