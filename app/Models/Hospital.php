<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;


    protected $table = "Hospitals";
    protected $fillable = ['name', 'address', 'created_at', 'updated_at'];

    public function Doctor(){

        return $this->hasMany('App\models\Doctor', 'Hospital_id', 'id');
    }

}
