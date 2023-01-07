<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phones extends Model
{
    protected $table = "phones";
    protected $fillable = ['code', 'phone', 'user_id'];
    protected $hidden = ['user_id'];
    public $timestamps = false;
    #protected $updated_at = false;

    ############################ Begin relations ##############################

public function user(){

    return $this->belongsTo('App\models\User', 'user_id');
}

############################## End Begin relations #######################
}
