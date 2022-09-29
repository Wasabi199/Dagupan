<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Complaints;
use App\Services\Barangays;
// use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Request as QueryRequest;

class AdminController extends Controller
{
    //
    public function dagupanComplaint(QueryRequest $request){
        // dd($request);
        $complaints = Complaints::orderBy('created_at')
        ->where('status','Solved')
        ->limit(4)
        ->paginate(4);
        // $filter = Complaints::filter($request::only('id'))
        // // ->appends($request::only('id'))
        // ;
        // dd($filter);
        return Inertia::render('Admin/AdminView',[
            'Complaints'=>$complaints,
            // 'filter'=>$filter
        ]);
    }
    public function barangay(QueryRequest $request){
        
        $ranking =[
            'Bacayao Norte'=>0,
            'Bacayao Sur'=>0,
            'Barangay I'=>0,
            'Barangay II'=>0,
            'Barangay IV'=>0,
            'Bolosan'=>0,
            'Bonuan Binloc'=>0,
            'Bonuan Boqiug'=>0,
            'Bonuan Gueset'=>0,
            'Calmay'=>0,
            'Carael'=>0,
            'Caranglaan'=>0,
            'Herero'=>0,
            'Lasip Chico'=>0,
            'Lasip Grande'=>0,
            'Lomboy'=>0,
            'Lucao'=>0,
            'Malued'=>0,
            'Mamalingling'=>0,
            'Mangin'=>0,
            'Mayombo'=>0,
            'Pantal'=>0,
            'Poblacion Oeste'=>0,
            'Pogo Chico'=>0,
            'Pogo Grande'=>0,
            'Pugaro Suit'=>0,
            'Salapingao'=>0,
            'Salisay'=>0,
            'Tambac'=>0,
            'Tapuac'=>0,
            'Tebeng'=>0,
        ];

        foreach(Complaints::all() as $rank){
            switch($rank){
                case $rank->address == 'Bacayao Norte':
                    $ranking['Bacayao Norte']++;
                    break;
                case $rank->address =='Bacayao Sur':
                    $ranking['Bacayao Sur']++;
                    break;
                case $rank->address =='Barangay I':
                    $ranking['Barangay I']++;
                    break;
                case $rank->address =='Barangay II':
                    $ranking['Barangay II']++;
                    break;
                case $rank->address =='Barangay IV':
                    $ranking['Barangay IV']++;
                    break;
                case $rank->address =='Bolosan':
                    $ranking['Bolosan']++;
                    break;
                case $rank->address =='Bonuan Binloc':
                    $ranking['Bonuan Binloc']++;
                    break;
                case $rank->address =='Bonuan Boqiug':
                    $ranking['Bonuan Boqiug']++;
                    break;
                case $rank->address =='Bonuan Gueset':
                    $ranking['Bonuan Gueset']++;
                    break;
                case $rank->address =='Calmay':
                    $ranking['Calmay']++;
                    break;
                case $rank->address =='Carael':
                    $ranking['Carael']++;
                    break;
                case $rank->address =='Caranglaan':
                    $ranking['Caranglaan']++;
                    break;
                case $rank->address =='Herero':
                    $ranking['Herero']++;
                    break; 
                case $rank->address =='Lasip Chico':
                    $ranking['Lasip Chico']++;
                    break;
                case $rank->address =='Lasip Grande':
                    $ranking['Lasip Grande']++;
                    break;
                case $rank->address =='Lomboy':
                    $ranking['Lomboy']++;
                    break;
                case $rank->address =='Lomboy':
                    $ranking['Lomboy']++;
                    break;
                case $rank->address =='Lucao':
                    $ranking['Lucao']++;
                    break;
                case $rank->address =='Malued':
                    $ranking['Malued']++;
                    break;
                case $rank->address =='Mamalingling':
                    $ranking['Mamalingling']++;
                    break;
                case $rank->address =='Mangin':
                    $ranking['Mangin']++;
                    break;
                case $rank->address =='Mayombo':
                    $ranking['Mayombo']++;
                    break;
                case $rank->address =='Pantal':
                    $ranking['Pantal']++;
                    break;
                case $rank->address =='Poblacion Oeste':
                    $ranking['Poblacion Oeste']++;
                    break;
                case $rank->address =='Pogo Chico':
                    $ranking['Pogo Chico']++;
                    break;
                case $rank->address =='Pogo Grande':
                    $ranking['Pogo Grande']++;
                    break;
                case $rank->address =='Pugaro Suit':
                    $ranking['Pugaro Suit']++;
                    break;
                case $rank->address =='Salapingao':
                    $ranking['Salapingao']++;
                    break;
                case $rank->address =='Salisay':
                    $ranking['Salisay']++;
                    break;
                case $rank->address =='Tambac':
                    $ranking['Tambac']++;
                    break;
                case $rank->address =='Tapuac':
                    $ranking['Tapuac']++;
                    break;
                case $rank->address =='Tebeng':
                    $ranking['Tebeng']++;
                    break;
            }
        }
        $filter = $request::only(['address']);
        isset($filter['address']) && $filter['address'] != null? $filter['address'] = $filter['address']: $filter['address'] = null;
        $barangayCount = Complaints::filterBarangay($filter)->get()->count();
        
        $new_complaint = 0;
        arsort($ranking);
        foreach(Complaints::filterBarangay($filter)->get() as $complaints){
            if(($complaints->created_at)->format('Y-m-d') == Carbon::now()->format('Y-m-d')){
                $new_complaint++;
            }
        }
        // dd($barangay);
        return Inertia::render('Admin/Barangay',[
            'Ranking'=>array_keys($ranking),
            'Barangay'=>$barangayCount,
            'filters'=>$filter,
            'newComplaint'=>$new_complaint,

        ]);
    }
    public function transferedComplaint(){
        $complaints = Complaints::orderBy('created_at')
        ->where('status','Transfered')
        ->limit(4)
        ->paginate(4);
     
        return Inertia::render('Admin/AdminTransfered',[
            'TransferedComplaints'=>$complaints
        ]);
    }
}
