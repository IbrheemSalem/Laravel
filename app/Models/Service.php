<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "services";
    protected $fillable = ['name','created_at','updated_at'];
    protected $hidden = ['updated_at', 'created_at', 'pivot'];
    #public $timestamps = false;
    #protected $updated_at = false;

    ############################ Begin relations Mnay-to-Mnay ##############################

    public function doctors(){
        return $this->belongsToMany('App\Models\Doctor','doctor_service','service_id','doctor_id','id','id');
    }

    ############################## End Begin relations #######################
}
