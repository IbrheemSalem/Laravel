<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patinent extends Model
{
    use HasFactory;

    protected $table = "patients";
    protected $fillable = ['name','age'];
    protected $hidden = ['create-at', 'pdate_at'];
    public $timestamps = false;


        ############################ Begin relations Mnay-to-Mnay ################

        public function doctor(){
            return $this->hasOneThrough('App\Models\Doctor', 'App\Models\Medical', 'patient_id', 'medical_id', 'id', 'id');
        }

        ############################## End Begin relations #######################
}
