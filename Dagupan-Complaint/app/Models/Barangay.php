<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;
    protected $fillable = [
        'barangay',
        'barangay_profile',
        'population',
        'history',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
