<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'address',
        'complainant_address',
        'value',
        'age',
        'email',
        'onRead',
        'status',
        'issue'
    ];

    protected static function booted()
    {
        static::deleted(function($complaints){
            $complaints->image()->delete();
        });
    }

    
    public function image(){
        return $this->hasMany(ComplaintImages::class);
    }

    public function scopeFilter($query, Array $filters){
        $query->when($filters['address'] ?? null, function($query, $filter){
            $query->where('address','=',$filter);
        })->where('status','Pending');
    }

    public function scopeFilterBarangay($query, Array $filters){
        $query->when($filters['address'] ?? null, function($query, $filter){
            $query->where('address','=',$filter);
        });
    }
}
