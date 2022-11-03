<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\Complaints as request;
use App\Http\Requests\Rates as rateRequest;
use App\Models\{Complaints, Rates};
use App\Services\Barangays;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as QueryRequest;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    //
    public function complaint(QueryRequest $query){
        $filters = $query::only(['address']);
        $rates = [0,0,0,0,0];
        isset($filters['address']) && $filters['address'] != null? $filters['address'] = $filters['address']: $filters['address'] = null;
        $barangays = Barangays::barangay();
        $complaint = Complaints::
        filter($filters)
        ->limit(3)
        ->paginate(3)
        ->appends($query::only(['address']));
        foreach(Rates::all() as $rate){
            switch($rate->rates){
                case 'Very Satisfied':
                    $rates[0]++;
                    break;
                case 'Satisfied':
                    $rates[1]++;
                    break;
                case 'OK':
                    $rates[2]++;
                    break;
                case 'Dissatisfied':
                    $rates[3]++;
                    break;
                case 'Very Dissatisfied':
                    $rates[4]++;
                    break;
                
            }
        }
        // dd($rates);
        return Inertia::render('User/UserComplaint',[
            'Barangays'=>$barangays,
            'Complaints'=>$complaint,
            'filters'=>$filters,
            'rates'=>$rates
        ]);
    }

    public function submitComplaint(request $request){
        // dd($request);
        $validated_data = $request->validated();
        // dd($validated_data);
        $complaint = Complaints::create([
            'name'=>$validated_data['name'],
            'address'=>$validated_data['address'],
            'complainant_address'=>$validated_data['complainant_address'],
            'age'=>$validated_data['age'],
            'email'=>$validated_data['email'],
            'status'=>$validated_data['status'],
            'issue'=>$validated_data['issue'],
            'value'=>$validated_data['value'],
            'onRead'=>false,
        ]);

        if($request->has('files')){
            foreach($request->file() as $file){
                foreach($file as $image){
                    $path = $image->storePublicly('ComplaintImages',  ['disk'=>'public']);
                    $complaint->image()->create([
                        'images'=>'../../../../storage/'.$path
                    ]);
                }
            }
        }
        Redirect::back();
   
    }
    
    public function submitRequest(rateRequest $request){
        $validated_data = $request->validated();
        Rates::create([
            'rates'=>$validated_data['rate'],
        ]);
        Redirect::route('complaint');
    }
}
