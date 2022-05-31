<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policestation extends Model
{
    use HasFactory;
    protected $table = 'policestations';
    protected $fillable = ['district_id','division_id','upazila_id','address','name','phone_no','email','user_id'];
    protected $with = ['division','district', 'upazila' ];
    public function userinfo()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function division()
    {
        return $this->belongsTo(Division::class,'division_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
    public function upazila()
    {
        return $this->belongsTo(Upazila::class,'upazila_id');
    }
}
