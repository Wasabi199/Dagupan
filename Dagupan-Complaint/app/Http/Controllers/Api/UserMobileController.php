<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserComplaintRequest as userRequest;
use App\Models\ComplaintImages;
use App\Models\Complaints;
use Symfony\Component\Console\Input\Input;

class UserMobileController extends Controller
{
    //
    public function userComplaintPost(userRequest $request)
    {
        $validated_data = $request->validated();
        $complaint = Complaints::create([
            'name' => $validated_data['name'],
            'age' => $validated_data['age'],
            'address' => $validated_data['address'],
            'complainant_address' => $validated_data['complainant_address'],
            'email' => $validated_data['email'],
            'value' => $validated_data['value'],
            'issue' => $validated_data['issue'],
            'status' => $validated_data['status'],
        ]);
        // if($request->has('images')){
        //     foreach($request->file() as $file){
        //         foreach($file as $image){
        //             $path = $image->storePublicly('ComplaintImages',  ['disk'=>'public']);
        //             $complaint->image()->create([
        //                 'images'=>'../../../../storage/'.$path
        //             ]);
        //         }
        //     }
        // }
        // return ['result' =>$_FILES];
        if (isset($request->images)) {
            if (is_array($request->images)) {
                foreach ($request->images as $file) {
                    $path = $file->storePublicly('ComplaintImages',  ['disk' => 'public']);
                    ComplaintImages::create([
                        'complaints_id' => $complaint->id,
                        'images' => '../../../../storage/' . $path
                    ]);
                }
            } else {
                $path = $request->images->storePublicly('ComplaintImages',  ['disk' => 'public']);
                ComplaintImages::create([
                    'complaints_id' => $complaint->id,
                    'images' => '../../../../storage/' . $path
                ]);
            }
        }
          return [$_FILES];
    }
}
