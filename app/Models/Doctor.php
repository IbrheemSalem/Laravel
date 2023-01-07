<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = "Doctors";
    protected $fillable = ['name', 'address', 'title', 'created_at', 'updated_at', 'Hospital_id'];
    protected $hidden = ['updated_at', 'created_at', 'pivot', 'medical_id'];
    #public $timestamps = false;
    #protected $updated_at = false;

    ############################ Begin relations ##############################

    public function Hospitals(){

        return $this->belongsTo('App\Models\Hospital','hospital_id','id');
    }

    ############################## End Begin relations #######################
    ############################ Begin relations Mnay-to-Mnay ################

    public function services(){
        return $this->belongsToMany('App\Models\Service','doctor_service','doctor_id','service_id','id','id');
    }

    ############################## End Begin relations #######################


    //Get Attribute accessors
    public function getGenderAttribute($val){

        return $val == 1 ? 'male' : 'female';
    }
}
