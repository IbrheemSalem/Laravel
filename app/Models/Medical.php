<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;

    protected $table = "Medicals";
    protected $fillable = ['id','pdf', 'patient_id'];
    protected $hidden = ['create-at', 'pdate_at'];
    public $timestamps = false;



}
