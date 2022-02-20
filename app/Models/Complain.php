<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;
    protected $table = 'complains';
    protected $fillable = ['division_id','district_id','upazila_id','police_station','name','father_name','nid','phone_no','email','description','document','type','status','slug','complain_no'];

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
    public function policestation()
    {
        return $this->belongsTo(Policestation::class,'police_station');
    }
}
